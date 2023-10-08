<?php

namespace App\Services;

use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MediaService
{

    public static function upload($request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'file' =>  'required|file',
                'media_type' => 'required|integer', //1.image 2. video 3. file
            ]);
            if ($validator->fails()) {
                return ['status' => 500, 'error' => $validator->errors()];
            }

            $image_file = $request->file('file');
            $attrs = array(
                'filename' => $image_file->getClientOriginalName(),
                'extension' => $image_file->getClientOriginalExtension(),
                'size' => $image_file->getSize(),
                'mimeType' => $image_file->getMimeType()
            );

            if ($input['media_type'] == 1) {
                $filePath = Storage::disk('public')->put('/media/image', $input['file']);
            } else {
                $file_name = time() . '-' . strtolower(str_replace(' ', '-', $attrs['filename']));
                $filePath = '/media/file/' . $file_name;
                Storage::disk('public')->put($filePath, file_get_contents($image_file));
            }

            $new_name = basename($filePath);

            $MediaModel = new Media();
            $MediaModel->file_path = $new_name;
            $MediaModel->media_type = $input['media_type'];
            $MediaModel->attrs = serialize($attrs);
            $MediaModel->created_at = Carbon::now();
            $MediaModel->save();

            return ['status' => 200, 'data' => $MediaModel, 'file_name' => $image_file->getClientOriginalName(), 'msg' => 'Data has been added successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

    /**
     * Update an existing media record.
     *
     * @param $request
     * @param Media $media
     * @return array
     */
    public static function update($request, Media $media)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'file' =>  'required|file',
                'media_type' => 'required|integer', //1.image 2. video 3. file
            ]);
            if ($validator->fails()) {
                return ['status' => 500, 'error' => $validator->errors()];
            }

            $image_file = $request->file('file');
            $attrs = array(
                'filename' => $image_file->getClientOriginalName(),
                'extension' => $image_file->getClientOriginalExtension(),
                'size' => $image_file->getSize(),
                'mimeType' => $image_file->getMimeType()
            );

            // Remove the previous image or file, if it exists.
            if ($media->file_path) {
                Storage::disk('public')->delete($media->file_path);
            }

            // Update the media model.
            $media->file_path = $image_file->store('media', 'public');
            $media->media_type = $input['media_type'];
            $media->attrs = serialize($attrs);
            $media->updated_at = Carbon::now();
            $media->save();

            return ['status' => 200, 'data' => $media, 'file_name' => $image_file->getClientOriginalName(), 'msg' => 'Data has been updated successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

}
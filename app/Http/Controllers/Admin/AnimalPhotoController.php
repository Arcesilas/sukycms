<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\AnimalPhotoForm;
use App\Http\Requests\Admin\AnimalPhotoRequest;
use App\Models\Animal;
use App\Models\AnimalPhoto;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AnimalPhotoController extends AdminBaseController
{
    public function index(Animal $animal)
    {
        $animal->load([
            'photos' => function (HasMany $query) {
                return $query->orderBy('main', 'DESC');
            },
        ]);

        return view('admin.animals.photos.index', [
            'form' => (new AnimalPhotoForm())->make(),
            'model' => $animal,
        ]);
    }

    public function store(AnimalPhotoRequest $request, Animal $animal)
    {
        foreach ($request->file('photos') as $file) {
            $name = $animal->id . '-' . Str::random() . time();
            $url = $file->storeAs('animals', $name . '.jpg', 'uploads');

            $photoThumbnail = Image::make($file)->fit(200, 200)
                ->encode('jpg', 80);

            Storage::disk('uploads')
                ->put('animals/' . $name . '-thumbnail.jpg', $photoThumbnail->__toString());

            $photo = new AnimalPhoto();
            $photo->animal_id = $animal->id;
            $photo->photo = $url;
            $photo->thumbnail = 'animals/' . $name . '-thumbnail.jpg';
            $photo->main = ! $animal->hasMainPhoto();
            $photo->save();
        }

        flash('', 'Fotos subidas correctamente');

        return redirect()->back();
    }
}

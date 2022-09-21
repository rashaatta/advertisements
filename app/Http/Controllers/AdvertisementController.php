<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\AdvertisementImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * @group Advertisements
 *
 * APIs for managing Advertisements
 */
class AdvertisementController extends Controller
{
    /**
     * show all Advertisements
     * @return View
     */
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('advertisement.index', ['advertisements' => $advertisements]);
    }

    /**
     * Return create form
     * @return View
     */
    public function create()
    {
        return view('advertisement.create');
    }


    /**
     * Store advertisement.
     * @bodyParam name string required.
     * @bodyParam from Date (Y-m-d) required. Example: 2022-04-15
     * @bodyParam to Date (Y-m-d). Example: 2022-05-14
     * @bodyParam total float required.
     * @bodyParam daily_budget float required.
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'from' => ['required', 'date_format:Y-m-d'],
            'to' => ['required', 'date_format:Y-m-d'],
            'total' => ['required', 'numeric'],
            'daily_budget' => ['required', 'numeric'],
            'images[]' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $advertisement = Advertisement::create($request->all());
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $attachment) {
                if ($attachment) {
                    $filename = $attachment->getClientOriginalName();
                    uploadsStorage()->putFileAs('public/advertisement', $attachment, "{$filename}", 'public');
                    $advertisement->images()->create([
                        'file_name' => $filename,
                        'mime_type' => $attachment->getMimeType(),
                        'size' => $attachment->getSize(),
                    ]);
                }

            }
        }
        return redirect(route('advertisement.index'))->with('message', 'advertisement created successfully.');
    }

    /** show advertisement
     * @param int $id
     */
    public function show(int $id)
    {
        $advertisement = Advertisement::with(['images'])->find($id);
        if (!$advertisement) {
            return $this->modelNotFound();
        }

        return view('advertisement.view', ['advertisement' => $advertisement]);
    }

    /**
     * Return edit form
     */
    public function edit(int $id)
    {
        $advertisement = Advertisement::with(['images'])->find($id);
        if (!$advertisement) {
            return $this->modelNotFound();
        }

        return view('advertisement.edit', ['advertisement' => $advertisement]);
    }

    /**
     * Update advertisement.
     * @param Request $request
     * @param $id
     * @bodyParam name string required.
     * @bodyParam from Date (Y-m-d) required. Example: 2022-04-15
     * @bodyParam to Date (Y-m-d). Example: 2022-05-14
     * @bodyParam total float required.
     * @bodyParam daily_budget float required.
     */
    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::find($id);
        if (!$advertisement) {
            return $this->modelNotFound();
        }

        $request->validate([
            'name' => 'filled',
            'from' => ['filled', 'date_format:Y-m-d'],
            'to' => ['filled', 'date_format:Y-m-d'],
            'total' => ['filled', 'numeric'],
            'daily_budget' => ['filled', 'numeric'],
            'images[]' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $advertisement->update($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $attachment) {
                if ($attachment) {
                    $filename = $attachment->getClientOriginalName();
                    uploadsStorage()->putFileAs('public/advertisement', $attachment, "{$filename}", 'public');
                    $advertisement->images()->create([
                        'file_name' => $filename,
                        'mime_type' => $attachment->getMimeType(),
                        'size' => $attachment->getSize(),
                    ]);
                }

            }
        }
        return redirect(route('advertisement.index'))->with('message', 'advertisement updated successfully.');
    }

    /** Delete advertisement
     * @param int $id
     */
    public function destroy(int $id)
    {
        $advertisement = Advertisement::find($id);
        if (!$advertisement) {
            return $this->modelNotFound();
        }
        $advertisement->images()->delete();
        $advertisement->delete();
        return redirect(route('advertisement.index'))->with('message', 'advertisement deleted successfully.');
    }

    /** Delete advertisement image
     * @param int $id
     */
    public function delete(int $id)
    {
        $image = AdvertisementImage::find($id);
        if (!$image) {
            return $this->modelNotFound();
        }
        $image->delete();
        return redirect(route('advertisement.index'))->with('message', 'advertisement image deleted successfully.');
    }
}

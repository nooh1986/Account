<?php


namespace App\Repository;


use App\Interfaces\BoxRepositoryInterface;
use App\Models\Box;

class BoxRepository implements BoxRepositoryInterface 
{
    public function index()
    {
        $boxes = Box::all();
        return view('Box.index' , compact('boxes'));
    }


    public function create()
    {
        return view('Box.create');
    }

    public function store($request)
    {
        try
        {
            $data['name']  = $request->name;
            $data['code']  = $request->code;
            $data['notes'] = $request->notes;

            if($request->image)
            $NameFile = uploadFile($request->image , "image");
            $data['image'] = $NameFile;

            Box::create($data);

            toastr()->success('تم حفظ البيانات بنجاح');
            return redirect()->route('Box.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $box = Box::findorfail($id);
        return view('Box.edit' , compact('box'));
    }



    public function update($request)
    {
        try
        {
            $box = Box::findorfail($request->id);
            
            $data['name']  = $request->name;
            $data['code']  = $request->code;
            $data['notes'] = $request->notes;


            // if($request->image)
            if($request->image != '')
            {
                unlink('image/' . $box->image);
                $NameFile = uploadFile($request->image , "image");
                $data['image'] = $NameFile;
            }
            

            $box->update($data);

            toastr()->success('تم تعديل البيانات بنجاح');
            return redirect()->route('Box.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($request)
    {
        try
        {
            $box = Box::findorfail($request->id);

            if($box->image != null)
            {
                unlink('image/' . $box->image);
            }

            $box->delete();

            toastr()->error('تم حذف البيانات بنجاح');
            return redirect()->route('Box.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}    



            
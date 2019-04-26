<?php
namespace App\Http\Controllers;
use Session;
use DB;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{

	public function Index(){
		$data = DB::table('galleries')->get();
		return view('gallery1', compact('data'));
	}

	// public function getdash(){
	// 		$data = DB::table('record_group')->get();
	// 		return view('dashboard.imagedash',compact('data'));
	//return view('dashboard.card.index',compact('data'));
	// $rdfn3_id = DB::table('bd_record_group')
	// 						->select('id')
	// 						->where('rg_id',$id)
	// 						->where('bd_id',3)
	// 						->first();
	// }
	public function create()
    {
        return view('gallery');
    }

	public function store(Request $request)
	{
		$this->validate($request, [
			'image' => 'required',
			'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		if($request->hasfile('image'))
		{
			foreach($request->file('image') as $image)
			{
				$name=$image->getClientOriginalName();
				$image->move(public_path().'/images/', $name);
				$data[] = $name;
			}
		}
		$validatedData = $request->validate([
								'title' => 'required',
								'description' => 'required',
						]);

		Gallery::create($request->all());
		$form= new Gallery();
		$form->image=json_encode($data);


		$form->save();
		return back()->with('success', 'Your images has been successfully');
	}
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
		//
	}
	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
		//
	}
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id)
	{
		//
	}
	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
		//
	}
}

?>

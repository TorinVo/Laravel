<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
/**
 * Using Model
 */
use App\Models\Cate;
class AdminCategoryController extends Controller
{
    public function index(){
    	$cate = Cate::get()->toArray();
    	return view('admin.category.list',compact('cate'));
    }

    public function getAdd()
    {
    	$cate = Cate::where('parent',0)->get()->toArray();
    	return view('admin.category.frm',compact(
    			'cate'
    		));
    }

    public function postSave(Request $request)
    {
    	if(!empty($request->get('txt_hd_id'))){
    		/**
    		 * Phần Cập Nhật
    		 */
    		$this->validate($request, 
    			[
    				'txt_name'        => 'required',
					'txt_discription' => 'required',
				],
				[
					'txt_name.required' => 'Vui Lòng Nhập Tên Loại Sản Phẩm',
					'txt_discription.required' => 'Vui Lòng Nhập Mô Tả',
				]
	        );
	        
    		$id = $request->get('txt_hd_id');
    		$m_data = Cate::find($id);
			$m_data->name        = !empty($request->get('txt_name'))?Strip_tags($request->get('txt_name')):'';
			$m_data->alias       = !empty($request->get('txt_name'))?Strip_tags(changeTitle($request->get('txt_name'))):'';
			$m_data->parent      = !empty($request->get('slt_category'))?$request->get('slt_category'):0;
			$m_data->description = !empty($request->get('txt_discription'))?Strip_tags($request->get('txt_discription')):'';
			$m_data->save();
			if(!empty($request->get('txt_add_new')) && $request->get('txt_add_new') == 1){
				return redirect('/admin/category/add')
    				->with(['flash_message' => 'Cập Nhật Thành Công.']);
			}else{
				return redirect('/admin/category')
    				->with(['flash_message' => 'Cập Nhật Thành Công.']);
			}
			
    	}else{
    		/**
    		 * Phần Thêm Mới
    		 */
    		$this->validate($request, 
    			[
    				'txt_name'        => 'required',
					'txt_discription' => 'required',
				],
				[
					'txt_name.required' => 'Vui Lòng Nhập Tên Loại Sản Phẩm',
					'txt_discription.required' => 'Vui Lòng Nhập Mô Tả',
				]
	        );
    		$m_data = new Cate;
    		$m_data->name        = !empty($request->get('txt_name'))?$request->get('txt_name'):'';
			$m_data->alias       = !empty($request->get('txt_name'))?changeTitle($request->get('txt_name')):'';
			$m_data->parent      = !empty($request->get('slt_category'))?$request->get('slt_category'):0;
			$m_data->description = !empty($request->get('txt_discription'))?$request->get('txt_discription'):'';
			$m_data->save();
			if(!empty($request->get('txt_add_new')) && $request->get('txt_add_new') == 1){
				return redirect('/admin/category/add')
	    			->with(['flash_message' => 'Thêm Thành Công.']);
	    	}else{
	    		return redirect('/admin/category')
	    			->with(['flash_message' => 'Thêm Thành Công.']);
	    	}
    	}
    }

    public function getEdit($id)
    {	
    	$cate = Cate::get()->toArray();
    	$m_data = Cate::find($id)->toArray();
    	$m_title = 'Chỉnh Sửa';
    	return view('admin.category.frm',compact(
    		'm_title',
    		'cate',
    		'm_data'
    		)
    	);
    }

    public function getDelete($id)
    {
    	$data = Cate::find($id)->toArray();
    	if(!empty($data))
    		return json_encode($data);
    	else
    		return json_encode('error');
    }
}

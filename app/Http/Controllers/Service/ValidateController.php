<?php

namespace App\Http\Controllers\Service;

use App\Tool\Validate\ValidateCode;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
// use App\Tool\SMS\SendTemplateSMS;
use App\Models\M3Result;
use App\ORM\User;
use App\ORM\TempEmail;

class ValidateController extends Controller
{
  public function create(Request $request)
  {
    $validateCode = new ValidateCode;
    $request->session()->put('validate_code', $validateCode->getCode());
    return $validateCode->doimg();
  }

  public function validateEmail(Request $request)
  {
    $member_id = $request->input('member_id', '');
    $code = $request->input('code', '');
    if($member_id == '' || $code == '') {
      return '验证异常';
    }
    $tempEmail = TempEmail::where('member_id', $member_id)->first();
    if($tempEmail == null) {
      return '验证异常';
    }
    if($tempEmail->code == $code) {
      if(time() > strtotime($tempEmail->deadline)) {
        return '该链接已失效';
      }
      $member = Member::find($member_id);
      $member->active = 1;
      $member->save();
      return redirect('/login');
    } else {
      return '该链接已失效';
    }
  }
}

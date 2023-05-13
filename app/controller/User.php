<?php
declare (strict_types = 1);

namespace app\controller;

use app\validate\User as UserValidate;
use think\exception\ValidateException;
use think\facade\Db;
use think\Request;

class User
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //查询数据

        $user = Db::name('user')->select();

        return json(['code' => 200, 'msg' => '获取成功', 'data' => $user]);

    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //获取数据
        $data = $request->param();

        //验证数据
        try {
            //验证通过
            validate(UserValidate::class)->check($data);

        } catch (ValidateException $e) {

            // 验证失败 输出错误信息
            return json(['code' => 400, 'msg' => $e->getError()]);

        }

        //添加数据
        $res = Db::name('user')->insert($data);

        if ($res == 1) {
            return json(['code' => 200, 'msg' => '注册成功']);
        } else {
            return json(['code' => 400, 'msg' => '注册失败']);
        }


    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //查询数据

        $user = Db::name('user')->where('id', $id)->select();
        if ($user) {
            return json(['code' => 200, 'msg' => '获取成功', 'data' => $user]);
        } else {
            return json(['code' => 201, 'msg' => '获取失败']);
        }
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}

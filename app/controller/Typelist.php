<?php
declare (strict_types = 1);
namespace app\controller;
use think\exception\ValidateException;
use think\facade\Validate;
use think\facade\Db;
use think\Request;
use app\validate\Typelist as TypelistValidate;

class Typelist
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //查询数据

       $list = Db::name('list')->select();

       return json(['code' => 200, 'msg' => '获取成功', 'data' => $list]);

    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return \think\response\Json
     */
    public function save(Request $request)
    {
        //获取数据
        $data = $request->param();

       //验证数据
        try {
            //验证通过
            validate(TypelistValidate::class)->check($data);

        } catch (ValidateException $e) {

            // 验证失败 输出错误信息
            return json(['code' => 400, 'msg' => $e->getError()]);

        }

        //添加数据
        $res = Db::name('list')->insert($data);
        if ($res == 1) {
            return json(['code' => 200, 'msg' => '添加成功']);
        } else {
            return json(['code' => 400, 'msg' => '添加失败']);
        }

    }

    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request
     * @param int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->param();

        //验证数据
        try {
            //验证通过
            validate(TypelistValidate::class)->scene('edit')->check($data);

        } catch (ValidateException $exception) {

            // 验证失败 输出错误信息
            return json(['code' => 400, 'msg' => $exception->getError()]);
        }

       //验证
        $updateData = Db::name('list')->where('id', $id)->find();

      if ($updateData['name'] === $data['name']) {
                return json(['code' => 400, 'msg' => '修改的和原来的一致']);
            }

       //更新数据
        $res = Db::name('list')->where('id', $id)->update($data);

        if ($res == 1) {
            return json(['code' => 200, 'msg' => '更新成功']);
        } else {
            return json(['code' => 400, 'msg' => '更新失败']);
        }

    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //id
        if (!Validate::isInteger($id)) {
            return json(['code' => 400, 'msg' => 'id不合法']);
        }

        //删除
          $res = Db::name('list')->delete($id);
        if ($res == 1) {
            return json(['code' => 200, 'msg' => '删除成功']);
        } else {

            // 删除失败
            return json(['code' => 400, 'msg' => '删除失败']);
        }

    }


}

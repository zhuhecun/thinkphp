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
        if ($res) {
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

        $data = [
            'id' => '2',
            'name' => 'equest',
             ];

          return Db::name('list')->update($data);


    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }


}

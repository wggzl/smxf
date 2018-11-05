<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Repositories\SessRepository;

class ProfileComposer
{
    /**
     * 用户对象的实例。
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * 创建一个新的个人数据视图组件。
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(SessRepository $sess)
    {
        // 所有依赖都会自动地被服务容器解析...
        $this->sess = $sess;
    }

    /**
     * 将数据绑定到视图。
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('store_session', $this->sess->get());
    }
}
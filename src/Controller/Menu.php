<?php 

namespace Os\Test\Controller;
use Os\Test\Model\Menu as modelMenu;
use Os\Test\View;

class Menu {
    
    private $menu;

    public function __construct() {
        $this->menu = new modelMenu;
    }

    // عرض جميع عناصر المنيو
    public function getMenu() {
        $menus = $this->menu->getAllMenues();
        View::Render('menu.php', ['menus' => $menus]);
    }

    // عرض صفحة إضافة عنصر جديد
    public function makeMenu() {
        View::Render('manage_menu.php');
    }

    // إنشاء عنصر جديد
    public function createMenu() {
        $menuData = filter_input_array(INPUT_POST);
        echo $this->menu->create($menuData);
    }

    // عرض تفاصيل عنصر معين
    public function viewMenu($id) {
        $menu = $this->menu->getMenuDetail($id);
        View::Render('viewMenu.php', ['menu' => $menu]);
    }

    // عرض صفحة تعديل عنصر
    public function editMenu($id) {
        $menu = $this->menu->getMenuDetail($id);
        View::Render('editMenu.php', ['menu' => $menu]);
    }

    // تحديث بيانات عنصر
    public function updateMenu($id) {
        $menuData = filter_input_array(INPUT_POST);
        echo $this->menu->update($menuData, $id);
    }

    // حذف عنصر
    public function deleteMenu($id) {
        echo $this->menu->delete($id);
    }
}

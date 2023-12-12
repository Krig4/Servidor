<?php
class Mesa{
    public int $num;
    public User $waiter;
    public Menu $menu;

    public function __construct(int $num, User $waiter, Menu $menu) {
        $this->num = $num;
        $this->waiter = $waiter;
        $this->menu = $menu;
    }
}
?>
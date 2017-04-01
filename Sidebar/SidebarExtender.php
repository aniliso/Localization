<?php

namespace Modules\Localization\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\User\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('localization::localization.title.localization'), function (Item $item, Group $group) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('localization::localization.title.zone'), function(Item $item) {
                    $item->item(trans('localization::countries.title.countries'), function (Item $item) {
                        $item->icon('fa fa-copy');
                        $item->weight(0);
                        $item->append('admin.localization.country.create');
                        $item->route('admin.localization.country.index');
                        $item->authorize(
                            $this->auth->hasAccess('localization.countries.index')
                        );
                    });
                    $item->item(trans('localization::cities.title.cities'), function (Item $item) {
                        $item->icon('fa fa-copy');
                        $item->weight(0);
                        $item->append('admin.localization.city.create');
                        $item->route('admin.localization.city.index');
                        $item->authorize(
                            $this->auth->hasAccess('localization.cities.index')
                        );
                    });
                    $item->item(trans('localization::districts.title.districts'), function (Item $item) {
                        $item->icon('fa fa-copy');
                        $item->weight(0);
                        $item->append('admin.localization.district.create');
                        $item->route('admin.localization.district.index');
                        $item->authorize(
                            $this->auth->hasAccess('localization.districts.index')
                        );
                    });
                });
            });
        });

        return $menu;
    }
}

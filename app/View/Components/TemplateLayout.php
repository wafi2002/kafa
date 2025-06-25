<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TemplateLayout extends Component
{
    public string $title;
    public string $bg_color;
    public array $navItems;
    // public array $subNavItems;

    public function __construct($title = 'Dashboard', $bg_color = 'bg-light')
    {
        $this->title = $title;
        $this->bg_color = $bg_color;

        // check user role
        $user = auth()->user();

        // Default nav items and sub items
        $this->navItems = [];
        // $this->subNavItems = [];

        if ($user) {
            switch ($user->role) {
                case 'teacher':
                    $this->navItems = [
                        ['label' => 'Home', 'url' => route('teacher.dashboard')],
                        ['label' => 'Activity', 'url' => route('activities.search')],
                        ['label' => 'Result', 'url' => route('students.searchForm')],
                        ['label' => 'Timetable', 'url' => route('manage.timetable.list')],
                    ];
                    break;
                case 'parent':
                    $this->title = 'Dashboard';
                    $this->bg_color = '#ffffff';
                    $this->navItems = [
                        ['label' => 'Home', 'url' => route('parent.dashboard')],
                        ['label' => 'Activity', 'url' => route('Parent.activities.search')],
                        ['label' => 'Result', 'url' => route('parents.search')],
                        ['label' => 'Timetable', 'url' => route('manage.timetable.list')],
                    ];
                    break;
                case 'muip':
                    $this->title = 'Dashboard';
                    $this->bg_color = '#ffffff';
                    $this->navItems = [
                        ['label' => 'Home', 'url' => route('muip.dashboard')],
                        ['label' => 'Student Result', 'url' => route('muip.showSearchForm')],
                        ['label' => 'Timetable', 'url' => '#'],
                        [
                            'label' => 'Report',
                            'url' => '#',
                            'children' => [
                                ['label' => 'Activity', 'url' => route('report.ViewFinishActivityList')],
                                ['label' => 'Academic', 'url' => route('report.AcademicYearOption')],
                            ]
                        ],
                        ['label' => 'Activity', 'url' => route('MUIPadmin.activities.search')],
                    ];
                    break;
                case 'kafa':
                    $this->title = 'Dashboard';
                    $this->bg_color = '#ffffff';
                    $this->navItems = [
                        ['label' => 'Home', 'url' => route('kafa.dashboard')],
                        ['label' => 'Student Result', 'url' => '#'],
                        ['label' => 'Timetable', 'url' => route('manage.timetable.list')],
                        ['label' => 'Report', 'url' => route('report.ViewActivityList')],
                        ['label' => 'Fee', 'url' => '#'],
                        ['label' => 'Activity', 'url' => route('KAFAadmin.activities.search')],
                    ];
                    break;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.template-layout');
    }
}

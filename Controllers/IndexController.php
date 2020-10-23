<?php
namespace App\Controllers;
use App\Models\IndexModel;
use App\Views\View;
/**
 * Controller for index page
 */
class IndexController extends Controller
{
    private $pageName = 'homepage';
    private $available_sort = [
        'name',
        'email',
        'done',
    ];
    private $available_sort_lables = [
        'name' => 'User name',
        'email' => 'User email',
        'done' => 'Status',
    ];
    private $available_sort_ways = [
        'asc',
        'desc',
    ];
    const DEFAULT_SORT = 'name';
    const DEFAULT_SORT_WAY = 'asc';
    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();

    }

    public function index()
    {
        $countPages = $this->countPages();
        $begin = $this->countTasks($countPages);
        $sort = $this->checkSort();
        $sortOrder = $this->sortOrder();

        $this->pageData['countPages'] = $this->countPages();
        $this->pageData['title'] = 'Home page';
        $this->pageData['tasks'] = $this->getTasks($begin, $sort);
        $this->pageData['sortOrder'] = $sortOrder;
        $this->view->render($this->pageName, $this->pageData);
    }

    private function sortOrder()
    {
        $currentSort = $_GET['sort'];
        $currentNumber = array_search($currentSort, $this->available_sort);

        $change = $this->available_sort[0];
        $this->available_sort[0] = $currentSort;
        $this->available_sort[$currentNumber] = $change;

        return $this->getSortWays();
    }

    private function getSortWays()
    {
        $sortWays = [];

        foreach ($this->available_sort as $value) {
            $sortWays[$value] = $this->available_sort_lables[$value];
        }

        return $sortWays;
    }

    private function checkSort()
    {
        if (!isset($_GET['sort']) or !isset($_GET['way'])) {
            $_GET['sort'] = self::DEFAULT_SORT;
            $_GET['way'] = self::DEFAULT_SORT_WAY;
            return [
                'sort' => self::DEFAULT_SORT,
                'way' => self::DEFAULT_SORT_WAY,
            ];
        }
        if (isset($this->available_sort[$_GET['sort']]) and isset($this->available_sort_ways[$_GET['way']])) {
            return [
                'sort' => $_GET['sort'],
                'way' => $_GET['way'],
            ];
        }
        return [
            'sort' => $_GET['sort'],
            'way' => $_GET['way'],
        ];
    }

    private function countPages()
    {
        return $this->model->countPages();
    }

    private function countTasks($countPages)
    {
        if (!isset($_GET['page']) or !(integer)$_GET['page'] or $_GET['page'] > $countPages) {
            $_GET['page'] = 1;
            return 0;
        }
        else {
            $begin = ($_GET['page'] - 1) * 3;
            return $begin;
        }
    }

    private function getTasks($begin, $sort)
    {
        return $this->model->getTasks($begin, $sort);
    }
}

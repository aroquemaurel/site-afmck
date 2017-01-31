<?php
declare(strict_types = 1);
namespace viewers;

class Pagination {
    private $currentPage;
    private $nbPages;
    private $link;

    public function __construct($currentPage, $nbPages, $link) {
        $this->currentPage = $currentPage;
        $this->link = $link;
        if(!strpos($this->link, '?')) {
            $this->link .= '?';
        }
        $this->nbPages = $nbPages;
    }

    public function toString() : string {
        $ret = '';
        if($this->nbPages != 1) {
            $ret = '
        <nav>
            <ul class="pagination">
                <li ' . ($this->currentPage == 1 ? 'class="disabled' : '') . '">
                    <a href="' . $this->link . '&p=' . ($this->currentPage - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                </li>';
            for ($i = 1; $i <= $this->nbPages; ++$i) {
                $ret .='<li ' . ($this->currentPage == $i ? 'class="active"' : '') . '>';
                $ret .= '<a href="' . $this->link . '&p=' . $i . '">' . $i . '</a>';
                $ret .= '</li>';
            }

            $ret .='<li ' . ($this->currentPage == $this->nbPages ? 'class="disabled"' : '') . '>
                    <a href="' . $this->link . '&p=' . ($this->currentPage + 1) . '" aria-label="Next"><span aria-hidden="true">»</span></a>
                </li>
            </ul>
        </nav>';
        }

        return $ret;
    }

    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param mixed $currentPage
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    public static function getNbPages($nbValues, $nbItemByPage) {
        return ceil($nbValues/$nbItemByPage);
    }

}
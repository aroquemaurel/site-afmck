<?php
namespace utils;

class Pagination {
    private $currentPage;
    private $nbPages;
    private $link;

    public function __construct($currentPage, $nbPages, $link) {
        $this->currentPage = $currentPage;
        $this->link = $link;
        $this->nbPages = $nbPages;
    }

    public function display() {
        if($this->nbPages != 1) {
            echo '
        <nav>
            <ul class="pagination">
                <li ' . ($this->currentPage == 1 ? 'class="disabled' : '') . '">
                    <a href="' . $this->link . '?p=' . ($this->currentPage - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                </li>';
            for ($i = 1; $i <= $this->nbPages; ++$i) {
                echo '<li ' . ($this->currentPage == $i ? 'class="active"' : '') . '>';
                echo '<a href="' . $this->link . '?p=' . $i . '">' . $i . '</a>';
                echo '</li>';
            }

            echo '<li ' . ($this->currentPage == $this->nbPages ? 'class="disabled"' : '') . '>
                    <a href="' . $this->link . '?p=' . ($this->currentPage + 1) . '" aria-label="Next"><span aria-hidden="true">»</span></a>
                </li>
            </ul>
        </nav>';
        }
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

}
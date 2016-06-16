<?php

class Pagination
{
  private $start       = 0;
  private $end         = 0;
  private $itemPerPage = 10;
  private $buttonShown = 5;
  private $currentPage = 1;
  private $totalPage   = 0; 
  private $totalRecord = 0;
  private $params      = array();
 
  public function __construct($totalRecord, $itemPerPage = null, $buttonShown = null)
  {
    if ($itemPerPage !== null) {
      $this->setItemPerPage($itemPerPage);
    }
    
    $this->totalRecord = $totalRecord;
    $this->setTotalPage($totalRecord);
    
    if ($buttonShown !== null) {
      $this->setButtonShown($buttonShown);
    }
  }
  
  public function setTotalPage($totalRecord)
  {
    $this->totalPage = (int)ceil($totalRecord / $this->itemPerPage);
  }

  public function verifyPage($page)
  {
    if (($this->getTotalPage() === 0 && (int)$page === 1) || empty($page)) { 
      return true;
    } elseif ($page > $this->getTotalPage() || $page < 1 || preg_match('/^[0-9]{1,}$/', $page) === 0) { 
      return false;
    } else { 
      return true;
    }
  }

  public function setCurrentPage($page)
  {
    if (($page <= 1) || preg_match('/^[0-9]{1,}$/', $page) === 0) {
      $this->currentPage = 1;
    } elseif ($page > 1 && $page <= $this->getTotalPage()) {
      $this->currentPage = (int)$page;
    } elseif ($page > $this->getTotalPage()) { 
      $this->currentPage = $this->getTotalPage();
    } 
  }

  public function setItemPerPage($item)
  {
    $this->itemPerPage = (int)$item; 
    $this->setTotalPage($this->totalRecord); 
  }

  public function setButtonShown($button)
  {
    $this->buttonShown = (int)$button; 
  }

  public function getCurrentPage()
  {
    return $this->currentPage;
  }

  public function getStart()
  {
    return $this->start;
  }

  public function getEnd()
  {
    return $this->end;
  }

  public function getItemPerPage()
  {
    return $this->itemPerPage;
  }

  public function getButtonShown()
  {
    return $this->buttonShown;
  }

  public function getOffset()
  {
    return ($this->currentPage - 1) * $this->itemPerPage;
  }

  public function getTotalPage()
  {
    return $this->totalPage;
  }

  public function hasPreviousPage()
  {
    return (($this->currentPage - 1) !== 0);
  }

  public function getPreviousPageNumber()
  {
    return $this->currentPage - 1;
  }

  public function hasNextPage()
  {
    return (($this->currentPage + 1) <= $this->totalPage); 
  }

  public function getNextPageNumber()
  {
    return $this->currentPage + 1;
  }

  public function getPageNumbers() 
  {
    $total = $this->totalPage;
    if ($total <= 1) {
      return array();
    }
    
    $middle  = (int)ceil($this->buttonShown / 2);
    $current = $this->currentPage;
    $size    = $this->buttonShown;

    if ($current <= $middle) {
      $start = 1;
      $end   = min($size, $total);
    } else {
      $end   = min($total, $current + ($size - $middle));
      $start = max(1, $end - ($size - 1));
    }

    $numbers = array();
    for ($i = $start; $i <= $end; $i++) {
      $numbers[] = $i;
    }

    return $numbers;
  }

  public function setUri($uri, $params = array())
  {
    $parsed = parse_url($uri);

    if (isset($parsed['path'])) {
      $this->pageUri = $parsed['path'];
    }

    if (isset($parsed['query'])) {
      parse_str($parsed['query'], $_params);
      $params = array_merge($_params, $params);
    }

    $this->setParams($params);
  }

  public function setParams(array $params)
  {
    $this->params = $params;
  }

  public function createUri($page = null)
  {
    $params = $this->params;
    
    if (empty($page)) {
      unset($params['page']);
    } else {
      $params['page'] = $page;
    }

    if (empty($params)) {
      return $this->pageUri;
    } else {
      return $this->pageUri . '?' . http_build_query($params, '', '&');
    }
  }
}

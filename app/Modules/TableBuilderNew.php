<?php
namespace App\Modules;

class TableBuilderNew {
    protected $html = "";
    protected $tableColumns = [];
    public function __construct($emptyText = "") {
        $this->class = "";
        $this->name = "";
        $this->id = "";
        $this->columns = [];
        $this->totals = [];
        $this->formatters = [];
        $this->detailsUrl = "";
        $this->editUrl = "";
        $this->emptyText = $emptyText;
    }

    public function addColumn(string $field, string $header, $formatter = null) {
        $this->columns[$header] = $field;
        $this->formatters[$header] = $formatter;
    }

    public function setClass(string $class)  {
        $this->class = $class;
    }

    public function setRows($collection) {
        $this->collection = $collection;
    }

    public function setEditUrl($editUrl) {
        $this->editUrl = $editUrl;
    }

    public function setDetailsUrl($detailsUrl) {
        $this->detailsUrl = $detailsUrl;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTable() {
        $this->openTag('table', "class='$this->class' name='$this->name' id='$this->id'")
        ->openTag('thead')
        ->renderThead()
        ->closeTag('thead')
        ->openTag('tbody')
        ->renderTbody()
        ->closeTag('tbody')
        ->openTag('tfoot')
        ->renderTfoot()
        ->closeTag('tfoot')
        ->closeTag('table');
        return $this->html;
    }

    public function renderThead() {
        $this->row = $this->getOpenTag('tr');
        
        foreach ($this->columns as $header => $field) {
            $this->row = $this->row . $this->getOpenTag('th');
            $this->row = $this->row . $header;
            $this->row = $this->row . $this->getCloseTag('th');
        }

        if ($this->editUrl !== "") {
            $this->row = $this->row . $this->getOpenTag('th');
            $this->row = $this->row . "Edit";
            $this->row = $this->row . $this->getCloseTag('th');
        }

        if ($this->detailsUrl !== "") {
            $this->row = $this->row . $this->getOpenTag('th');
            $this->row = $this->row . "Details";
            $this->row = $this->row . $this->getCloseTag('th');
        }

        $this->html = $this->html . $this->row . $this->getCloseTag('tr');
        
        return $this;
    }

    protected function renderTbody()
    {
        foreach ($this->collection as $model) {
            $this->row = $this->getOpenTag('tr');
            
            foreach ($this->columns as $header => $field) {
                $this->row = $this->row . $this->getOpenTag('td');

                if (isset($this->formatters[$header])) {
                    $formatter = $this->formatters[$header];
                    $this->row = $this->row . $formatter->format($model, $field);
                } else {
                    $this->row = $this->row . $model->$field;
                }
                
                $this->row = $this->row . $this->getCloseTag('td');
            } 

            if ($this->editUrl !== "") {
                $this->row = $this->row . $this->getOpenTag('td');
                $this->row = $this->row . $this->createEdit($model->id);
                $this->row = $this->row . $this->getCloseTag('td');
            }

            if ($this->detailsUrl !== "") {
                $this->row = $this->row . $this->getOpenTag('td');
                $this->row = $this->row . $this->createDetails($model->id);
                $this->row = $this->row . $this->getCloseTag('td');
            }


            $this->html = $this->html . $this->row . $this->getCloseTag('tr');
        }
                
        return $this;
    }

    private function openTag($tag, $attr = null)
    {
        $this->html = $this->html . $this->getOpenTag($tag, $attr);
        
        return $this;
    }
    
    private function closeTag($tag)
    {
        $this->html = $this->html . $this->getCloseTag($tag);
        
        return $this;
    }
    
    private function getOpenTag($tag, $attr = null)
    {
        return "<$tag $attr>";
    }
    
    private function getCloseTag($tag)
    {
        return "</$tag>";
    }

    public function createEdit($id) {
        return "<a href='" . $this->editUrl . $id . "'><span class='las la-edit'></span></a>";
    }

    public function createDetails($id) {
        return "<a href='" . $this->detailsUrl . $id . "'><span class='las la-info-circle'></span></a>";
    }

    public function addTotals(array $totals) {
        $this->totals = $totals;
    }

    public function renderTfoot() {
        if (count($this->totals) > 0) {
            $this->row = $this->getOpenTag('tr');
            foreach ($this->totals as $description => $value) {
                $this->row = $this->row . $this->getOpenTag('td', 'colspan=2 style="font-weight:bold;"');
                $this->row = $this->row . $description . $value;
                $this->row = $this->row . $this->getCloseTag('td');
            }
            $this->html = $this->html . $this->row . $this->getCloseTag('tr');
        }
        return $this;
    }
}
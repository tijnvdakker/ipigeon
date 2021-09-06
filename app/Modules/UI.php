<?php
abstract class Formatter {
    abstract public function format($model, $field);
}

class switchFormatter extends Formatter{
    public function format($model, $field) {
        $checked = "";
        if ($model->{$field} == 1) {
            $checked = "checked='checked'";
        }
        return "<label class='switch'>
               <input type='checkbox' data-id={$model->id} {$checked}>
               <span class='slider round'></span>
               </label>";
    }
}
class dropdownFormatter extends Formatter{
    public $options;
    public function __construct(array $options) {
        $this->options = $options;
    }
    public function format($model, $field) {
        $select = "<select data-id={$model->id}>";
        foreach ($this->options as $option) {
            if ($model->{$field} == $option) {
                $select .= "<option value='{$option}' selected>" .  $option . "</option>";
            } else {
                $select .= "<option value='{$option}' >" .  $option . "</option>";
            }
        }
        $select .= "</select>";
        return $select;  
    }
}

class suffixFormatter extends Formatter {
    public function __construct(string $suffix) {
        $this->suffix = $suffix;
    }
    public function format($model, $field) {
        return $model->{$field} . $this->suffix;
    }
}

class prefixFormatter extends Formatter {
    public function __construct(string $prefix) {
        $this->prefix = $prefix;
    }
    public function format($model, $field) {
        return $this->prefix . $model->{$field};
    }
}

class spanFormatter extends Formatter {
    public function __construct($attr) {
        $this->attr = $attr;
    }
    public function format($model, $field) {
        return "<span $this->attr>" . $model->{$field} . "</span>";
    }
}

class pageHeader {
    public $title;
    public $buttons;
    public $subTitle;
    public function __construct(string $title, array $buttons = []) {
        $this->title = $title;
        $this->buttons = $buttons;
    }

    public function addSubTitle($subTitle) {
        $this->subTitle = $subTitle;
    }

    public function render() {
        if (!isset($this->subTitle)) {
            $this->subTitle = "";
        }
        $pageheader = 
        "<div class='page-header'>
            <div class='header-title'>
                <h1>" . $this->title . "</h1>
                <small>" . $this->subTitle .  "</small>
            </div>
            <div class='header-actions'>";
            foreach($this->buttons as $name => $link) {
                $pageheader .= "<a href='" . $link . "'>" . "<span class='las la-plus-square'></span>" .  $name  . "</a>";
            }
        $pageheader .= 
            "</div>
        </div>";
        return $pageheader;
    }
}

use Carbon\Carbon;

function viewDate($models) {
    foreach ($models as $model) {
        $model->date = Carbon::createFromFormat('Y-m-d', $model->date)->format('d-m-Y');
    }
    return $models;
}

function dateToDifference($date) {
    return Carbon::parse($date)->diffInDays('00-00-0000');
}

function differenceToDate($difference) {
    return Carbon::parse("0000-00-00")->addDays($difference);
}


?>

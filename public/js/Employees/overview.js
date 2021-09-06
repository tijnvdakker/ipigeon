var checkBoxes = document.querySelectorAll("input[type='checkbox']");
for (var checkBox of checkBoxes) {
    if (checkBox.id == "sidebar-toggle") {
        continue;
    }
    checkBox.addEventListener('change', function(event) {
        if (this.checked) {
            this.checked = true;
            ajaxCall('employee_active', {id:this.getAttribute('data-id'), value:1});
        } else {
            this.checked = false;
            ajaxCall('employee_active', {id:this.getAttribute('data-id'), value:0});
        }
    });
}
$('#date_picker').datepicker({
    uiLibrary: 'bootstrap4',
    format:
        'yyyy-mm-dd'
});

function Check(that) {
    if (that.value == "anders") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}

var counter = 1;
var limit = 8;
function addInput(divName){
    if (counter == limit)  {
        alert("You have reached the limit of adding " + counter + " inputs");
    }
    else {
        var newdiv = document.createElement('div');
        newdiv.innerHTML =  "<div id='dynamicInput'></div>"+"<div class=\"row mt-3\" >\n" +
            "            <div class=\"col\">\n" +
            "                <label for=\"role\">Rol "+ (counter + 1) +"</label><select name=\"role[]\" id=\"role\" class=\"form-control\" required>\n" +
            "                    <option value=\"choose\" selected></option>\n" +
            "                    <option value=\"ober\">Ober</option>\n" +
            "                    <option value=\"gast\">Gastheer/vrouw</option>\n" +
            "                    <option value=\"receptie\">Receptie</option>\n" +
            "                </select>\n" +
            "            </div>\n" +
            "            <div class=\"col\">\n" +
            "              <label for=\"all_roles\">Aantal mensen voor deze rol</label><input class=\"form-control\" type=\"text\" name=\"all_roles[]\" placeholder=\"Aantal\">\n" +
            "            </div>\n" +
            "        </div>"+
            "        </div>";
        document.getElementById(divName).appendChild(newdiv);
        counter++;
    }
}
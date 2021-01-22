// check and AddTask

let btnAdd = document.getElementById('newTaskBtn');
if (btnAdd) {
    btnAdd.onclick = function () {
        let name = document.getElementById('newTaskName');
        let email = document.getElementById('newTaskE-mail');
        let taskText = document.getElementById('newTask');

        let checkName = false;
        if (name.value.length > 0) {
            checkName = true;
            name.style.borderColor = '';
        } else {
            name.style.borderColor = "red";
        }

        let checkEmail = false;
        if (email.value.length > 0 &&
            email.value.match(/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/)) {
            checkEmail = true;
            email.style.borderColor = '';
        } else {
            email.style.borderColor = "red";
        }

        let checkText = false;
        if (taskText.value.length > 0) {
            checkText = true;
            taskText.style.borderColor = '';
        } else {
            taskText.style.borderColor = "red";
        }

        if (checkName && checkEmail && checkText) {

            var sendObj = {name: name.value, email: email.value, task: taskText.value};
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/views/AddTask/addTask.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('param=' + JSON.stringify(sendObj));
            xhr.onreadystatechange = function () {

                if (this.readyState == 4) {
                    var modal = document.getElementById("my_modal");
                    var span = document.getElementsByClassName("close_modal_window")[0];
                    var text = document.getElementById("addText");

                    if (this.status == 200 && this.response == 'true') {
                        text.innerText = 'Task added';
                    } else {
                        text.innerText = 'Sorry, there was an error.';
                    }

                    modal.style.display = "block";
                    span.onclick = function () {
                        window.location.reload();
                    }

                    window.onclick = function (event) {
                        if (event.target == modal) {
                            window.location.reload();
                        }
                    }

                }
            };
        }
    }
}

// sort by

let title = document.getElementsByClassName('title');
if (title) {
    for (let a in title) {
        title[a].onclick = function () {
            sort(title[a]);
        }
    }
}

function sort(sortGroup) {
    let getParam = '?';
    if (sortGroup.className == "head title") {
        sortGroup.className = "asc";
        getParam += 'sort=' + sortGroup.id + '&path=asc';
    } else if (sortGroup.className == "asc title") {
        sortGroup.className = "desc";
        getParam += 'sort=' + sortGroup.id + '&path=desc';
    } else if (sortGroup.className == "desc title") {
        sortGroup.className = "asc";
        getParam += 'sort=' + sortGroup.id + '&path=asc';
    }
    if (param['pagen']) {
        getParam += '&pagen=' + param['pagen'];
    }
    document.location = getParam;

}

// Pagination


let pagenPage = document.getElementsByClassName('pagen');
if (pagenPage) {
    for (let a in pagenPage) {
        pagenPage[a].onclick = function () {
            pagen(pagenPage[a], pagenPage.length);
        }
    }
}

function pagen(pagenPage, count) {
    let get = '?';
    for (var i in param) {
        if (i == 'pagen')
            continue;
        get += i + "=" + param[i] + "&";
    }
    if (pagenPage.text == '1' || pagenPage.text == '«') {
        get += "pagen=1"
        document.location = get;
    } else if (pagenPage.text == '»') {
        get += "pagen=" + (count - 2);
        document.location = get;
    } else {
        get += "pagen=" + pagenPage.text;
        document.location = get;
    }
}


// change table

let change = document.querySelectorAll('[data-name]');
for (let j in change) {
    change[j].oninput = function () {
        changeTable(change[j]);
    }
}

function changeTable(element) {
    let changeElement = document.getElementById(element.id);
    let name = element.attributes['data-name'].value;
    let value;
    let id = element.attributes['data-id'].value;
    if (name == 'completed') {
        if (changeElement.checked) {
            value = 1;
        } else {
            value = 0;
        }
    } else if (name == 'task') {
        value = changeElement.value.replace(/\(отредактировано администратором\)/g, "") + " (отредактировано администратором)";
    }

    var sendObj = {name: name, value: value, id: id};
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/views/TaskTable/change.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('param=' + JSON.stringify(sendObj));
    xhr.onreadystatechange = function () {

        if (this.readyState == 4) {

            if (this.status == 200 && this.response == 'false') {
                var modal = document.getElementById("my_modal");
                var span = document.getElementsByClassName("close_modal_window")[0];
                var text = document.getElementById("addText");
                text.innerText = 'please log in';
                modal.style.display = "block";
                span.onclick = function () {
                    window.location.reload();
                }

                window.onclick = function (event) {
                    if (event.target == modal) {
                        window.location.reload();
                    }
                }
            }
        }
    };

}
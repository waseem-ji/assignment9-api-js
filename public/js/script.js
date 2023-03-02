// function addTask() {
//     alert("Hello! I am an alert box!");
// }



$(document).ready(function () {
    getTasks(window.User["id"]);
});


function clearAndRefreshTasks() {
    let list = document.getElementById("outer-task-box");
    list.innerHTML = "";
    getTasks(window.User["id"])
}

function getTasks(id) {
    res = $.ajax({
        type: "GET",
        url: "http://todo_copy.test/api/todos",
        // headers: {
        //     Authorization: 'Bearer ' + token
        // },
        dataType: "json",
        data: {
            id: id,
        },
        success: function (result) {
            data = result["data"];
            // console.log(data);
            for (const item in data) {
                // console.log(data[item]);
                publishTasks(data[item]);
            }
        },
    });
    // console.log(window.User);
}

function publishTasks(tasks) {

    // console.log(tasks);
    let list = document.getElementById("outer-task-box");

    let ul = document.createElement("ul");
    ul.className = "list-group list-group-horizontal rounded-0 bg-transparent";

    let li = document.createElement("li");
    li.className =
        "list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent";

    pTask = document.createElement("p");
    pTask.className = "lead fw-normal mb-0";

    spanTask = document.createElement("span");
    spanTask.className = "span_title" + tasks["id"];
    spanTask.innerText = tasks["task"];

    pTask.appendChild(spanTask);
    li.appendChild(pTask);
    ul.appendChild(li);
    // End of task title

    // Now  Buttons
    liButton = document.createElement("li");
    liButton.className =
        "list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent";
    div = document.createElement("div");

    a1 = document.createElement("button");
    a1.className = "btn btn-success mr-3 status"+tasks['id'];
    a1.innerText = "Completed";
    a1.setAttribute("type","button");
    a1.setAttribute("onclick","toggleCompleteStatus("+tasks['id'] +")");
    div.appendChild(a1);

    a2 = document.createElement("a");
    a2.className = "btn btn-primary m-2 edit"+tasks['id'];
    a2.setAttribute("type","button");
    a2.setAttribute("href","/todos/"+tasks['id']+"/edit");
    a2.innerText = "EDIT";
    div.appendChild(a2);

    deleteForm = document.createElement("form");
    deleteForm.className = "d-inline";
    deleteForm.setAttribute("method", "post");
    deleteForm.setAttribute("action", "api/todos/"+tasks['id']);



    // create a submit button
    var s = document.createElement("button");
    s.setAttribute("type", "button");
    s.setAttribute("value", "submit");
    s.setAttribute("onclick","deleteTask("+tasks['id'] +")");
    s.innerHTML = "DELETE";
    s.className = "btn btn-danger ml-3 d-inline";

    deleteForm.appendChild(s);

    div.appendChild(deleteForm);
    liButton.appendChild(div);
    ul.appendChild(liButton);
    // End button
    list.appendChild(ul);

    checkStatus(tasks);

}

function checkStatus(tasks) {
    console.log("This is check status function");
    // console.log(tasks);
    if (tasks['completed'] == true) {
        // console.log("task:  " + tasks["task"] + " is completed");
        // title = document.getElementsByClassName("span_title"+tasks['id']);
        document.getElementsByClassName("span_title"+tasks['id'])[0].style.textDecorationLine = "line-through";

        completed = document.getElementsByClassName("status"+tasks['id'])[0];
        completed.innerHTML = "NOT COMPLETED";
        completed.className = "btn btn-warning mr-3 status"+tasks['id'];
        //set edit to disabled

        edit = document.getElementsByClassName("edit"+tasks['id'])[0];
        edit.className = "disabled btn btn-primary m-2 edit"+tasks['id'];
    }
    else {
        completed = document.getElementsByClassName("status"+tasks['id'])[0];
        completed.innerHTML = "COMPLETED";
        completed.className = "btn btn-success mr-3 status"+tasks['id'];

        document.getElementsByClassName("span_title"+tasks['id'])[0].style.textDecorationLine = "";

        edit = document.getElementsByClassName("edit"+tasks['id'])[0];
        edit.className = " btn btn-primary m-2 edit"+tasks['id'];
    }
}

function toggleCompleteStatus(id) {

    $.ajax({
        type: "GET",
        url: "http://todo_copy.test/api/todos/"+id,
        // headers: {
        //     Authorization: 'Bearer ' + token
        // },
        success: function (result) {
            // data = result["data"];
            // console.log(result['data']);
            // getTasks(id);
            checkStatus(result['data']);
            toastr.success(" ", "Task status updated");

        },
    });

}


function deleteTask(id) {
    // pop a alert
    if(confirm("Are you sure you want to delete?")){

        $.ajax({
            url: 'http://todo_copy.test/api/todos/'+id,
            type: 'DELETE',
            success: function (data) {
                // console.log(data);
                clearAndRefreshTasks();
                toastr["error"]("Task Deleted");
            }
        });

    }
}


function editTask(id) {


    if(confirm("Are you sure you want to edit?")){
        newTask = document.getElementById('editedTask').value;
        $.ajax({
            url: 'http://todo_copy.test/api/todos/'+id,
            type: 'PUT',
            dataType: "json",
            data: {
                task:newTask,
            },
            success: function (data) {
                // console.log(data);
                window.location.href = "/todos";
            }
        });
        toastr["info"]("Task Updated");

    }

}


function addTask() {
    user_id = window.User["id"];
    task = document.getElementById("newTask").value;

    $.ajax({
        url: 'http://todo_copy.test/api/todos',
        type: 'POST',
        dataType: "json",
        data: {
            task:task,
            user_id:user_id
        },
        success: function (data) {
            console.log(data);
            // getTasks(user_id);
            clearAndRefreshTasks();
            toastr.success("Task Added Succesfully");
        }
    });


}

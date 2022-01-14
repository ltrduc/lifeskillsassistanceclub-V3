// Thiết lập lại giao diện khi gửi form
function DisplayReset() {
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
}

// Thống kê
function deleteStatistics(id_schoolyear, semester, schoolyear) {
  document.getElementById('delete-info-schoolyear').innerHTML = schoolyear;
  document.getElementById('delete-info-semester').innerHTML = semester;
  document.getElementById("delete-id_schoolyear").value = id_schoolyear;
  document.getElementById("delete-semester").value = semester;
}

function deleteDetailedStatistics(id_attendance, fullname) {
  document.getElementById('delete-info-fullname').innerHTML = fullname;
  document.getElementById("delete-id_attendance").value = id_attendance;
}
// Năm học
function deleteShoolYear(id_schoolyear, name) {
  document.getElementById('delete-info-schoolyear').innerHTML = name;
  document.getElementById("delete-id_schoolyear").value = id_schoolyear;
}

// Ban điều hành
function deleteExecutive(id_executive, name) {
  document.getElementById('delete-info-executive').innerHTML = name;
  document.getElementById("delete-id_executive").value = id_executive;
}

// Chức vụ
function deletePosition(id_position, name) {
  document.getElementById('delete-info-position').innerHTML = name;
  document.getElementById("delete-id_position").value = id_position;
}

// Ban hoạt động
function deleteTeam(id_team, name) {
  document.getElementById('delete-info-team').innerHTML = name;
  document.getElementById("delete-id_team").value = id_team;
}

// Thành viên
function deleteMember(id_user, fullname) {
  document.getElementById('delete-info-member').innerHTML = fullname;
  document.getElementById("delete-id_user").value = id_user;
}

function editMember(id_user, id_student, fullname, team) {
  document.getElementById("edit-id_user").value = id_user;
  document.getElementById("edit-id_student").value = id_student;
  document.getElementById("edit-fullname").value = fullname;
  document.getElementById("edit-team").value = team;
}

// Cộng tác viên
function deleteCollaborate(id_user, fullname) {
  document.getElementById('delete-info-collaborate').innerHTML = fullname;
  document.getElementById("delete-id_user").value = id_user;
}

function editCollaborate(id_user, id_student, fullname) {
  document.getElementById("edit-id_user").value = id_user;
  document.getElementById("edit-id_student").value = id_student;
  document.getElementById("edit-fullname").value = fullname;
}

// resetpassword
function resetPassword(id_user, fullname) {
  document.getElementById('resetpassword-info-user').innerHTML = fullname;
  document.getElementById("resetpassword-id_user").value = id_user;
}

// Thanh tìm kiếm
$(document).ready(function () {
  $("#search-sidebar").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#sidebar-list li").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
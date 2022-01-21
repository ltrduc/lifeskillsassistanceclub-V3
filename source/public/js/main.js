// Thiết lập lại giao diện khi gửi form
function DisplayReset() {
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
}
// Lịch trực ban
function deleteSchedule(id_schedule) {
  document.getElementById("delete-id_schedule").value = id_schedule;
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

// Lịch học
function deleteCourse(id_schoolyear, semester, date) {
  document.getElementById('delete-info-date').innerHTML = date;
  document.getElementById("delete-id_schoolyear").value = id_schoolyear;
  document.getElementById("delete-semester").value = semester;
  document.getElementById("delete-date").value = date;
}

function deleteDetailedCourse(id_course, subject, group) {
  document.getElementById('delete-info-subject').innerHTML = subject;
  document.getElementById('delete-info-group').innerHTML = group;
  document.getElementById("delete-id_course").value = id_course;
}

// Môn học
function deleteSubject(id_subject, subject) {
  document.getElementById('delete-info-subject').innerHTML = subject;
  document.getElementById("delete-id_subject").value = id_subject;
}

function editSubject(id_subject, subject, note) {
  document.getElementById("edit-id_subject").value = id_subject;
  document.getElementById("edit-subject").value = subject;
  document.getElementById("edit-note").value = note;
}

// Năm học
function deleteSchoolYear(id_schoolyear, schoolyear) {
  document.getElementById('delete-info-schoolyear').innerHTML = schoolyear;
  document.getElementById("delete-id_schoolyear").value = id_schoolyear;
}

function editSchoolYear(id_schoolyear, schoolyear, note) {
  document.getElementById("edit-id_schoolyear").value = id_schoolyear;
  document.getElementById("edit-schoolyear").value = schoolyear;
  document.getElementById("edit-note").value = note;
}

// Quản lý thiết bị
function deleteDeviceGroup(id_devicegroup, devicegroup) {
  document.getElementById('delete-info-devicegroup').innerHTML = devicegroup;
  document.getElementById("delete-id_devicegroup").value = id_devicegroup;
}

function editDeviceGroup(id_devicegroup, devicegroup, note) {
  document.getElementById("edit-id_devicegroup").value = id_devicegroup;
  document.getElementById("edit-devicegroup").value = devicegroup;
  document.getElementById("edit-note").value = note;
}

function deleteDevice(id_device, device) {
  document.getElementById('delete-info-device').innerHTML = device;
  document.getElementById("delete-id_device").value = id_device;
}

function editDevice(devicegroup, id_device, id_devicegroup, description, device, note) {
  document.getElementById("edit-id_device").value = id_device;
  document.getElementById("edit-id_devicegroup").value = id_devicegroup;
  document.getElementById("edit-id_devicegroup-disabled").value = devicegroup;
  document.getElementById("edit-device").value = device;
  document.getElementById("edit-description").value = description;
  document.getElementById("edit-note").value = note;
}

// Quản lý mượn-trả
function deleteBorrow(id_borrow, borrower) {
  document.getElementById('delete-info-borrower').innerHTML = borrower;
  document.getElementById("delete-id_borrow").value = id_borrow;
}

function editBorrow(id_borrow, borrower, phone, device, quantily, date, purpose) {
  document.getElementById('edit-id_borrow').value = id_borrow;
  document.getElementById("edit-borrower").value = borrower;
  document.getElementById('edit-phone').value = phone;
  document.getElementById("edit-device").value = device;
  document.getElementById('edit-quantily').value = quantily;
  document.getElementById("edit-date").value = date;
  document.getElementById('edit-purpose').value = purpose;
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

  $("#Search-Attendance").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#Attendance-Table .Attendance-tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("#Search-Schedule").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#Schedule-Table .fc-list-item").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
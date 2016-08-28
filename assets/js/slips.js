function load_semesters(e) {
  var rollno = $('#roll').val();
  var el = $(this);
  $.ajax({
    url: 'slips/search_semesters',
    type: 'post',
    data: {'roll':rollno},
    beforeSend:function(){
      el.button('load');
    },
    success: function (data) {
      if(data === "0")
      {
        alert("We have no record of this student (Roll number : "+rollno+").");
        $('#student-registered-semesters').html('');
      }
      else
      {

       $('#student-registered-semesters').html(data);
      }
      el.button('reset');
      
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      $('.alert').html('');
      $('.alert').removeClass('alert-success').addClass('alert-danger');
      $('.alert').append("Ops some Error occured! Please reload/refresh the page and try again.");
      return false;
    }
  });
  return false;
}


$(function() {
  $(document).on('submit', ".form-enter-roll", load_semesters);
});
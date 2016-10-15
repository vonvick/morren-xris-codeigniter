var currentIndex = 0,
  items = $('.slides div'),
  itemAmt = items.length;

function cycleItems() {
  var item = $('.slides div').eq(currentIndex);
  items.hide();
  item.css('display','inline-block');
}

var autoSlide = setInterval(function() {
  currentIndex += 1;
  if (currentIndex > itemAmt - 1) {
    currentIndex = 0;
  }
  cycleItems();
}, 3000);

$('.next').click(function() {
  clearInterval(autoSlide);
  currentIndex += 1;
  if (currentIndex > itemAmt - 1) {
    currentIndex = 0;
  }
  cycleItems();
});

$('.prev').click(function() {
  clearInterval(autoSlide);
  currentIndex -= 1;
  if (currentIndex < 0) {
    currentIndex = itemAmt - 1;
  }
  cycleItems();
});

$(document).ready(function() {
  $('#gallerycategory').on('click', function() {
      $('#create_category').removeClass('hidden');
      $('#gallery_category_list').addClass('hidden');
    });
  $('#category-back').on('click', function() {
    $('#create_category').addClass('hidden');
    $('#gallery_category_list').removeClass('hidden');
  });
  $('.publish').on('click', function() {
    var categoryId = $(this).data('categoryId');
    console.log(categoryId);
    $.get('set_active/' + categoryId, function() {
      swal('Good job', 'You have successfully set a new active gallery', 'success');
      setTimeout(location.reload(), 2000);
    });
  });
  $('.delete-button').on('click', function() {
    var imageId = $(this).data('imageId');
    console.log(imageId);
    // $.get('delete_image/' + imageId, function() {
    //   swal('Good job', 'You have successfully deleted the image', 'success');
    //   setTimeout(location.reload(), 2000);
    // });
  });
  $('.modal-trigger').leanModal();
});
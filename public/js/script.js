
$(function () {
  let like = $('.likeToggle');
  let likeReviewId;
  like.on('click', function () {
    let $this = $(this);
    likeReviewId = $this.data('review-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/like',
      method: 'POST',
      data: {
        'review_id': likeReviewId
      },
      dataType:'json',
    })
    .done(function(data){
      $this.toggleClass('liked');
      $this.find('span').text(data.review_likes_count);
    })
    .fail(function () {
      alert('いいねできませんでした')
    });
  });
  });

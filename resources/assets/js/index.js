// $(".sidebar-toggle-box").click(function(e) {
//     e.preventDefault();
//     $("#wrapper").toggleClass("toggled");
// });
//
// $(window).resize(function(e) {
//     if ($(window).width() <= 768) {
//         $("#wrapper").removeClass("toggled");
//     } else {
//         $("#wrapper").addClass("toggled");
//     }
// });
// // });
// $("form").submit(function(e) {
//     e.preventDefault();
// });
// $('.sub-menu').click(function() {
//     $(this).children('ul')
//     // $('.sub').css('display','block')
// })
// // $(document).ready(function() {
//
// $('#user-all-tasks .remove-duty').click(function() {
//     $(this).parent().parent().fadeOut();
// });
// $('#user-new-task .reject-duty').click(function() {
//     $(this).parent().parent().fadeOut();
// });
//
// // $('#content .category-btn').click(function() {
// //     $('#content .categorylist').fadeToggle();
// // });
//
// $('.sidebar-toggle-box').click(function() {
//     $('#sidebar').fadeToggle();
// });
// $('.dcjq-parent-o').click(function() {
//     $(this).find('i.arrows').toggleClass('fa-caret-down , fa-caret-left')
//     $(this).parent().siblings().children().find('i.arrows').removeClass('fa-caret-down').addClass('fa-caret-left');
//
// });
//
//
// // $('#pricePlan #SlideCategory').click(function() {
// //     $('#pricePlan .slideCat').fadeToggle();
// // });
// // $('.block-user').click(function() {
// //     $(this).parent().parent().css('background', '#ff000052')
// // });
// // $('.show-user').click(function() {
// //     $(this).parent().parent().css('background', 'unset')
// // });
// $('.sub .tablinks').click(function() {
//     $(this).css({
//         'background': '#FCB322',
//         'color': 'white'
//     });
//     $(this).siblings().css('background', 'unset');
// });
//
// // function UploadCV(event) {
// //     let input = event.target.value;
// //     console.log(input);
// //     $('.UploadedCv').append(input);
// //     if (input.files && input.files[0]) {
// //         let reader = new FileReader();
// //         let image = event.target.files[0];
// //         reader.onload = (e) => {
// //
// //             let images = e.target.result;
// //         };
// //         reader.readAsDataURL(input.files[0]);
// //     }
// // }
//
// // function UploadVideo(event) {
// //     let input = event.target.value;
// //     console.log(input);
// //     $('.UploadedVideo').append(input);
// //     if (input.files && input.files[0]) {
// //         let reader = new FileReader();
// //         let image = event.target.files[0];
// //         reader.onload = (e) => {
// //
// //             let images = e.target.result;
// //         };
// //         reader.readAsDataURL(input.files[0]);
// //     }
// // }
//
// // function PortfolioImg(event) {
// //     let input = event.target.value;
// //     console.log(input);
// //     $('.PortfolioImg').append(input);
// //     if (input.files && input.files[0]) {
// //         let reader = new FileReader();
// //         let image = event.target.files[0];
// //         reader.onload = (e) => {
// //
// //             let images = e.target.result;
// //         };
// //         reader.readAsDataURL(input.files[0]);
// //     }
// // }
//
// // document.getElementById("defaultOpen").click();
// $(function() {
//     $('ul li').on('click', function() {
//         $(this).parent().find('li.active').removeClass('active');
//         $(this).addClass('active');
//     });
// });
//
// // ----add tags----
// // $('#content .add-tag').click(function(e) {
// //     let tagName = $('#tag').val();
// //     if (tagName != '') {
// //         $('#Taglist').append('<li><span><i class="fa fa-close removetag" style="color:black"></i></span>' + tagName + '</li>');
// //     }
// //     $('#tag').val('');
// //     $('.removetag').click(function() {
// //         $(this).parent().parent().remove();
// //     })
// // });
//
// // $('#pricePlan .add-plan-tag').click(function(e) {
// //
// // });
//-------Kiểm tra các nút trong index và product, nếu chưa login khi bấm sẽ chuyển sang login.php-----

document.addEventListener('DOMContentLoaded', function () 
{
    const requireLoginBtns = document.querySelectorAll('.require-login');
    requireLoginBtns.forEach(btn => 
    {
        btn.addEventListener('click', function (e) 
        {
            const isLoggedIn = document.body.getAttribute('data-loggedin');

            if (isLoggedIn !== 'true') 
            {
                e.preventDefault();
                alert('Bạn cần đăng nhập để thực hiện thao tác này!');
                window.location.href = 'log/login.php';
            }
        });
    });
});

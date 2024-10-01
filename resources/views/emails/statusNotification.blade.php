<!DOCTYPE html>
<html>
<head>
    <title>Thông báo buộc thôi học</title>
</head>
<body>
    <p>Kính gửi {{ $student->user->name }},</p>

    <p>Hệ thống đã tổng kết điểm của bạn và nhận thấy rằng điểm trung bình của bạn là  {{number_format($averageScore, 2)}}.</p>

    <p>Vì điểm trung bình của bạn dưới 5, nhà trường xin thông báo bạn đã bị buộc thôi học.</p>

    <p>Chúc bạn thành công trong tương lai!</p>

    <p>Trân trọng,</p>
    <p>Phòng Đào Tạo</p>
    <p>----Đại học điện lực----</p>
</body>
</html>
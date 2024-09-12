@component('mail::message')
# Thông tin tài khoản đăng nhập của bạn

Xin chào {{ $name }},

Tài khoản đăng nhập của bạn đã được tạo thành công.

**Email:** {{ $email }}  
**Mật khẩu:** {{ $password }}

Cảm ơn bạn đã sử dụng hệ thống của chúng tôi!

@component('mail::button', ['url' => url('/login')])
Đăng nhập ngay
@endcomponent

Trân trọng,<br>
{{ config('app.name') }}
@endcomponent

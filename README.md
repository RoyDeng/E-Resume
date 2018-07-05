# E-Resume
使用 Simple QrCode 產生二維碼

## 如何安裝與配置
在專案目錄下使用以下命令安裝套件：
composer require simplesoftwareio/simple-qrcode 1.3.*

註冊服務提供者：
```php
  SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class
```

新增 QrCode 介面
```php
  'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class
```


Bu API uygulaması, görevlerin (tasks) yönetimi için temel işlevler sağlar. Kullanıcılar görev oluşturabilir, güncelleyebilir, silebilir ve görüntüleyebilir. Ayrıca, görevlerin oluşturulması, güncellenmesi ve silinmesi gibi işlemlerde model tarihçelerini takip eden bir sistem de mevcuttur.

<h1>Kullanılan Teknolojiler</h1>
<ul>
    <li>Trait: Ortak işlevselliğin yeniden kullanılabilirliğini sağlamak amacıyla kullanılmıştır. Özellikle API yanıt formatlarını standartlaştırmak için uygulanmıştır.</li>
    <li>Policy: Kullanıcıların belirli görevler üzerinde yapabilecekleri işlemleri (örneğin güncelleme veya silme) kontrol etmek için kullanılmıştır. Bu, yetki yönetimi ve güvenliği sağlamak için önemlidir.</li>
    <li>Observer: Model olaylarına yanıt vermek için kullanılmıştır. Görevlerin oluşturulması, güncellenmesi ve silinmesi gibi işlemleri kaydederek tarihçelerini takip eden bir sistem sağlar.</li>
    <li>Sanctum: API güvenliğini sağlamak için kullanılan bu paket, token tabanlı kimlik doğrulama işlevini yerine getirir.</li>
    <li>Pint: Laravel kod standartlarını korumak ve kodun biçimlendirilmesini sağlamak amacıyla kullanılmıştır.</li>
</ul>

Bu proje, Laravel'de trait, policy ve observer kullanımının faydalarını görmek ve öğrenmek amacıyla geliştirilmiştir. Bu yapılar, kodun tekrar kullanılabilirliğini artırır, güvenliği sağlar ve uygulama içindeki model değişikliklerini etkili bir şekilde yönetmemize yardımcı olur. Proje ayrıca, bu teknolojilerin gerçek bir uygulama senaryosunda nasıl entegre edilebileceğini gösterir.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

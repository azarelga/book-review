<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



</p>
<div align="center" >
    
| Nama |NRP    | 
| :---:   | :---: | 
| Thariq Ivan Anendar | 5025221013   | 
| Azarel Grahandito | 5025221126   | 
    
</div>

## About Project

Project ini adalah pemenuhan tugas PBKK dengan menggunakan laravel, dengan rincian tugas sebagai berikut :
- simple CRUD with eloquent relationship (at least two tables relationship)
- do-able in 2 weeks
- work in pair (1 group 2 students)
- write your plan in Readme
- record your application, upload it on the YouTube, put the share link in Readme

## Database

Pada database kami, kami memiliki 4 tabel utama yaitu :
- Books : berisi data buku (Title, Description, Authors, Publisher, Genres, Rating, Price)
- Authors : berisi data author (id, Name)
- Genre : berisi data genre (id, Name)
- Users : berisi data user untuka utentikasi CRUD
- Reviews : berisi data nilai review (1-5), judul review, dan isi review

Relationship yang kami miliki adalah :
- Books ---Many to Many--- Authors
- Books ---Many to Many--- Genres
- Users ---One to Many--- Reviews
- Books ---One to Many--- Reviews

## Plan

Plan kami adalah membuat website yang dapat menampilkan buku, dimana buku ini dapat menjadi referensi apabila dibutuhkan oleh user. User dapat melihat rincian buku dengan melakukan click pada buku yang ada. Dihalaman utama akan disajukan bukun dengan rating terbaik, popular genre, random genre, popular author, dan random author. Data buku dapat ditambahkan oleh user untuk memperbanyak data yang ada. Dari data buku ini, kmai harap dapat membantu user dalam mencari buku dengan lebih mudah.

Week-1 - Membuat project laravel serta melakukan migrasi dan tampilan awal
Week-2 - Mengimplementasikan CRUD dan autentikasi kepada users
Week-3&4 - Mengimplementasikan CR untuk fitur review buku

## Screenshot Website

### Old

![image](https://github.com/user-attachments/assets/31d103b0-ba77-47d8-a6fb-e25e6c06aea6)

![image](https://github.com/user-attachments/assets/7edf79fd-9748-49bd-8768-f2232ef2138f)

![image](https://github.com/user-attachments/assets/550078b7-567a-4d2b-869d-53234dfdb786)

![image](https://github.com/user-attachments/assets/6a8da04c-0fc8-47a3-8c90-f2d76b4e1320)

![image](https://github.com/user-attachments/assets/9ab55d4b-150a-4c00-869f-9db56c059dc7)

![image](https://github.com/user-attachments/assets/5ca7a777-7b8f-4b66-a50f-3204c11f720f)

### New

<img width="1680" alt="Screen Shot 2024-10-21 at 23 12 04" src="https://github.com/user-attachments/assets/f179ae6f-2ec4-4ea3-8552-2138c3c651c7">
<img width="1680" alt="Screen Shot 2024-10-21 at 23 12 12" src="https://github.com/user-attachments/assets/2dfd8b8a-0262-4a58-81ca-507bea28d1aa">
<img width="1680" alt="Screen Shot 2024-10-21 at 23 12 25" src="https://github.com/user-attachments/assets/bce5b0a5-6005-44cf-a7d9-18c10cfe8109">
<img width="1680" alt="Screen Shot 2024-10-21 at 23 12 35" src="https://github.com/user-attachments/assets/d03a91d6-317a-444a-b099-68b2d1f95be8">


## Link Youtube
[Click Me](https://youtu.be/J19kkkr0ey8)
  
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# booKita
Membuat aplikasi web tentang CRUD buku dan jual beli e-book dengan menggunakan laravel 10, bootstrap 5 dan mysql

Cara ambil projek :
1. Buka vs code
2. Buka terminal
3. Ketik di htdocs git clone https://github.com/wintonalmundarisna/booKita.git

Cara update :
1. git remote add origin https://github.com/wintonalmundarisna/booKita.git // Buat narget link
2. git pull origin main // Buat ngambil kodingan terbaru
3. git add . // Buat nandain semua perubahan
4. git commit -m "Menambahkan fitur login" // Buat ngasih pesan
5. git push -u origin main // Buat ngirim kode ke branch utama

Cara run program :
1. Install composer
2. npm install (terminal)
3. npm run dev (terminal)
4. php artisan serve (terminal)
5. ctrl + klik kanan url (php artisan serve) yang muncul pada terminal

Url :
Winton = http://127.0.0.1:8000/home
Deni = http://127.0.0.1:8000/
Alfian = http://127.0.0.1:8000/register

Catatan Program :
1. Jika error = error: remote origin already exists. Maka jalankan git remote remove origin


Ukuran responsive
Tampilan Desktop: 1024×768 hingga 1920×1080
Tampilan Tablet: 601 × 962 hingga 1280 × 800
Tampilan Seluler: 360 × 640 hingga 414 × 896



 // $rules = [
        //     'judul' => 'required|max:200|unique:bukus',
        //     'nama' => 'required|max:200',
        //     'kategori' => 'required',
        //     'isi' => 'required',
        //     'gambar' => 'image|file',
        // ];

        // $validatedData = $request->validate($rules);
        
        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['judul'] = Str::limit(strip_tags($request->judul), 200);
        // $validatedData['judul'] = preg_replace('#</?(div|/).*?>#is', '', $request->judul);
        // $validatedData['isi'] = preg_replace('#</?div.*?>#is', '', $request->isi);
        // $data = Buku::create($validatedData);
        
        // if ($image = $request->file('gambar')) {
        //     $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        //     $imageName = $fileName . "-" . time() . "." . $image->getClientOriginalExtension();
        //     $uploadPath = 'img/';
        //     $image->move($uploadPath, $imageName);
        //     $data->gambar = $imageName;
        //     $data->save();
        // }

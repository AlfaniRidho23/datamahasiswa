<?php
include 'connection.php';
$conn = getConnection();

try{
    if ($_POST){
        $nama = $_POST["nim"];
        $nim = $_POST["nama"];
        $kelas = $_POST["kelas"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $agama = $_POST["agama"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $jurusan = $_POST["jurusan"];
        $fakultas = $_POST["fakultas"];
        $universitas = $_POST["universitas"];
        $keterangan = $_POST["keterangan"];

        
         $statment = $conn->prepare("INSERT INTO `mahasiswa2`(`nim`,`nama`,`kelas`,`jenis_kelamin`,`agama`, `tanggal_lahir`, `jurusan`,`fakultas`,`universitas`, `keterangan`) VALUES 
         (:nim,:nama,:kelas,:jenis_kelamin,:agama,:tanggal_lahir,:jurusan,:universitas,:keterangan);");

         $statment->bindParam(':nim', $nim);
         $statment->bindParam(':nama', $nama);
         $statment->bindParam(':kelas', $kelas);
         $statment->bindParam(':jenis_kelamin', $jenis_kelamin);
         $statment->bindParam(':agama', $agama);
         $statment->bindParam(':tanggal_lahir', $tanggal_lahir);
         $statment->bindParam(':jurusan', $jurusan);
         $statment->bindParam(':fakultas', $fakultas);
         $statment->bindParam(':universitas', $universitas);
         $statment->bindParam(':keterangan', $keterangan);

         $statment->execute();
         $respons["pesan"] = "Data berhasil dimasukkan";

         
        
       
    }
} catch (PDOException $e) {
    $respons["pesan"] = "Terjadi Kesalahan: " . $e->getMessage();   
}
echo json_encode($respons, JSON_PRETTY_PRINT);
# msu_food

แอปสั่งอาหาร MSU Food พัฒนาด้วย Flutter และ Firebase

## เริ่มใช้งาน

ติดตั้งแพ็กเกจและรันแอปด้วยคำสั่ง:

```powershell
flutter pub get
flutter run
```

## รูปภาพเมนูอาหาร

รูปจากกล้องหรือคลังภาพจะอัปโหลดไปยัง Firebase Storage และบันทึกลิงก์ใน Firestore
หาก Storage ยังไม่มี bucket และตอบ `object-not-found` แอปจะใช้ Firestore เก็บรูปสำรอง
(จำกัด 200 KB) เพื่อให้บันทึกเมนูได้
ก่อนใช้งาน:

1. เปิด Firebase Console ของโปรเจกต์ `msu-food-4fde3` ไปที่ **Storage** แล้วสร้าง
   bucket หากยังไม่มี โดยตรวจให้ bucket ID ตรงกับ `storageBucket` ใน
   `lib/firebase_options.dart` และ `storage_bucket` ใน
   `android/app/google-services.json`
   (ค่าปัจจุบันคือ `msu-food-4fde3.firebasestorage.app`)
2. ตั้งค่าการเรียกเก็บเงินตามแผนที่ Firebase Storage กำหนด (โปรเจกต์นี้ใช้
   Firebase Blaze)
3. เผยแพร่กฎใน `storage.rules`:

```powershell
firebase deploy --only storage --project msu-food-4fde3
```

กฎอนุญาตให้อ่านรูปเฉพาะผู้ใช้ที่ลงชื่อเข้าใช้ และจำกัดการอัปโหลด/ลบรูปให้เจ้าของร้าน
ของเมนูนั้นเท่านั้น โดยจำกัดขนาดไฟล์ไว้ที่ 1 MB

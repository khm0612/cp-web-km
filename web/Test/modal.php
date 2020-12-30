<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ขอแจ้งเปลี่ยนแปลงทีมพัฒนาเว็บไซต์ www.24catalog.com จากเดิมพัฒนาโดยโกซอฟท์เป็นพัฒนาโดยทีม otto (novomind และ osp) ซึ่งเป็นทีมพัฒนาเว็บไซต์ www.24shopping.com
                    มีผลใช้งานตั้งแต่วันที่ 1 มีนาคม 2560
                    ดังนั้นกระบวนการแก้ไขปัญหาของเว็บไซต์ www.24catalog.com ขอให้ใช้กระบวนการเดียวกับเว็บไซต์ www.24shopping.com ดังนี้
                    กระบวนการแจ้งปัญหา
                    1. ผู้ใช้งาน 24Shopping แจ้งปัญหาการใช้งาน ระบบ iPIM, iView, iShop และ AMOSNG (เว็บไซต์ www.24shopping.com, www.24catalog.com) ให้กับทีม Business Development
                    2. ทีม Business Development ตรวจสอบปัญหาเบื้องต้นว่าเป็นปัญหาหรือเป็นความต้องการใหม่ แล้วดำเนินการแก้ไขปัญหาเบื้องต้น
                    - กรณีที่ทีม Business Development แก้ไขปัญหาได้จะแก้ไขปัญหาให้กับผู้ใช้งานเบื้องต้น
                    - กรณีที่ทีม Business Development แก้ไขปัญหาไม่ได้จะโทรแจ้ง Hotline 1500 และส่งเมล์รายละเอียดปัญหาเป็นภาษาอังกฤษพร้อมกับระบุ Severity ให้กับ Hotline Call Centre (hotline@gosoft.co.th) เพื่อประสานงานต่อไป
                    รายละเอียดเพิ่มเติมเกี่ยวกับการ Log Incident และ การส่งเมล์ไปยัง OSP
                    # การ Log Incident เพิ่ม CC: orchidbiz@24shopping.co.th
                    # รายละเอียด Service Name และ Category
                    Service Name : New Developing
                    Category : ORCHID
                    # การเปิดTicket ไปยัง OSP :
                    To : otrs24s@osp.com.tw,
                    CC : hqs@gosoft.co.th, orchidbiz@24shopping.co.th
                    Subject : [Severity 1] CPU usage too high
                    Body:
                    Severity : 1
                    Incident information

                    ตรวจสอบ ขั้นตอนการรับเรื่อง iPIM, iView, iShop และ AMOSNG ตามไฟล์แนบ

                    ref mail : gosoft news 01032017 15:48
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
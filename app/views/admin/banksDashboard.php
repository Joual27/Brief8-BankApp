    <?php

    require APPROOT . '/views/incFile/htmlHeader.php'; 
    require APPROOT . '/views/incFile/sidebar.php'; 
    if($_SESSION["username"] == "" && $_SESSION["roleName"] == ""){
        header("location:".URLROOT."/pages/login");
    }
    else if($_SESSION["roleName"] == "client"){
        header("location:".URLROOT."/client/dashboard");
    }

    ?>

    <main>
    <?php 
    require APPROOT . '/views/incFile/userInfo.php'; 
    ?>
        <div class="ml-[16%] mt-[1rem]">
            <button class="py-[0.6rem] px-[1.2rem] bg-indigo-500 text-white font-semibold rounded-lg"><a href="<?php echo URLROOT ?>/admin/addBank">+ Add Bank</a></button>
        </div>
    <div>
        <table id="users" style="width: 79% ; margin-left : 16%;">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>NAME</td>
                        <td>LOGO</td>
                        <td>ACTIONS</td>     
                </thead>
                <tbody>
                <?php foreach($data["banks"] as $bank){ ?>
                     <?php $path = URLROOT."/pics/banks/".$bank->bankLogo ?>
                            <tr>
                                <td><?= $bank->bankID ?></td>
                                <td><?= $bank->bankName ?></td>
                                <td><img src="<?= $path ?>" alt="Bank's Logo"></td>
                                <td>
                                <a href='<?=URLROOT?>/admin/deleteBank?id=<?= $bank->bankID ?>' class='flex items-center justify-center bg-rose-500 text-white w-[40px] h-[40px]'>
                                    <i class='fa-solid fa-trash'></i>
                                </a>
                            
                            </td>
                            </tr>  
                    <?php  } ?>
                </tbody>
            </table>
            <p class="text-red-500 font-semibold">
                        <?php if(!empty($data["error"])){
                            echo $data["error"];
            }?>
        </p>
    </div>

    </main>

    <?php 
    require APPROOT . '/views/incFile/footer.php'; 
    ?>

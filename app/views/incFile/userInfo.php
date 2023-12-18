<div class=" h-[100px] w-[1500px] ml-[300px] flex justify-between items-center mt-[1rem]">
        <div>
            <img class="w-[300px]" src="<?php echo URLROOT ?>/pics/Logo.png" alt="">
        </div>
        <div>
           <div class="flex items-center gap-[10px]">
                <img class="w-[50px] h-[50px] rounded" src="<?php echo URLROOT ?>/pics/profile.png" alt="">
                <p class="font-semibold text-[1.1rem]"><?php echo $_SESSION["username"] ?></p>
              
           </div>  
           <div class="flex justify-center">
                <p class="font-semibold text-[1.1rem] text-amber-700"><?php echo $_SESSION["roleName"] ?></p>
           </div>         
        </div>
    </div>
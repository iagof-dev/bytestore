<?php

$id = $_GET['id'];
$api = new API();
$lorem = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Est dicta at repudiandae. Assumenda facilis obcaecati voluptates deleniti inventore, veritatis nobis sed quidem unde, repellat, dolores molestiae animi quibusdam. Ut, laboriosam!";
$perfil = $api->GET_USER_BY_ID($id);

if (empty($perfil['DATA']['0']['username']) && !isset($perfil['DATA']['0']['username'])) {
  header("Location: /");
  return;
}

$pfp = "../Assets/imgs/user-ph.webp";

if ($perfil['DATA']['0']['pfp'] != ' ' && $perfil['DATA']['0']['pfp'] != '' && !empty($perfil['DATA']['0']['pfp']) && $perfil['DATA']['0']['pfp'] != null && isset($perfil['DATA']['0']['pfp'])) {
  $pfp = "../Assets/imgs/users_pfp/" . $perfil['DATA']['0']['pfp'];
}


?>


<div class="container mx-auto grid place-content-center align-middle place-items-center auto-rows-auto">
<div
  style="width: 1152px; height: 174px; position: relative; overflow: hidden; border-radius: 32px; background: #fff; box-shadow: 9px 4px 4px 0 rgba(0,0,0,0.25);"
>
  <div style="width: 1021px; height: 138px;">
    <img
      src="<?= $pfp ?>"
      style="width: 140px; height: 127px; position: absolute; left: 80.5px; top: 23.5px; border-radius: 27px; object-fit: cover; box-shadow: -1px 4px 4px 0 rgba(0,0,0,0.25);"
    />
    <div style="width: 133px; height: 21px;">
      <p
        style="width: 122px; height: 21px; position: absolute; left: 235px; top: 32px; font-size: 16px; font-weight: 600; text-align: left; color: #000;"
      >
      <?= $perfil['DATA']['0']['username'] ?>
      </p>
      <svg
        width="17"
        height="17"
        viewBox="0 0 17 17"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        style="width: 17px; height: 17px; position: absolute; left: 351px; top: 36px;"
        preserveAspectRatio="none"
      >
        <g clip-path="url(#clip0_42_19)">
          <path
            d="M8.10361 1.37039C8.31498 1.16876 8.48182 1.01245 8.79165 0.722183C9.12311 1.12191 9.47364 1.45145 9.70904 1.84913C10.1204 2.54403 10.626 2.55413 11.2876 2.25503C11.6972 2.06983 12.1564 1.99437 12.649 1.85376C12.8422 2.67477 13.0118 3.3954 13.1932 4.16666C13.8682 4.32275 14.6149 4.49541 15.4834 4.69626C15.3321 5.27213 15.2497 5.84242 15.0291 6.35291C14.8065 6.86779 14.858 7.16811 15.3428 7.48738C15.7794 7.77491 16.1314 8.19088 16.4755 8.50843C16.4464 8.67239 16.456 8.74616 16.4236 8.78181C15.9128 9.3442 15.1267 9.83205 14.9594 10.4804C14.8002 11.0968 15.2866 11.8798 15.5057 12.6478C14.6809 12.8417 13.9605 13.011 13.1865 13.1929C13.0313 13.8663 12.8591 14.6134 12.6619 15.4694C12.1964 15.3547 11.7245 15.3194 11.3325 15.1239C10.6383 14.7778 10.1478 14.9219 9.70043 15.5206C9.43741 15.8726 9.10604 16.1735 8.55407 16.7681C8.17328 16.2646 7.82743 15.8365 7.51427 15.3857C7.1522 14.8644 6.70154 14.8519 6.16285 15.0567C5.71285 15.2278 5.245 15.3519 4.70871 15.5209C4.51005 14.6643 4.33767 13.921 4.16646 13.1828C3.45279 13.021 2.73017 12.8571 1.86015 12.6598C2.01192 12.1222 2.09398 11.583 2.31647 11.1098C2.56357 10.5842 2.44171 10.24 2.02992 9.90516C1.59889 9.55462 1.18497 9.18304 0.825989 8.87434C0.916481 8.63243 0.920686 8.56096 0.958357 8.52925C2.01509 7.63974 2.93145 6.71627 1.96107 5.20593C1.88275 5.08402 1.95074 4.86811 1.95074 4.67452C2.71536 4.50102 3.43781 4.33708 4.16852 4.17128C4.32866 3.46825 4.49335 2.74524 4.6844 1.90649C5.07293 1.98334 5.49777 1.97602 5.82633 2.15027C6.66401 2.59452 7.29164 2.42215 7.81132 1.66758C7.87711 1.57205 7.97569 1.49912 8.10361 1.37039ZM12.5653 5.5848C12.3072 5.71993 11.9996 5.80408 11.799 5.99861C10.6576 7.10569 9.54593 8.24328 8.41424 9.36046C8.15077 9.62056 7.84885 9.84171 7.49977 10.1353C7.10829 9.71183 6.77899 9.33485 6.42767 8.97964C5.53498 8.0771 5.479 8.08637 4.79551 9.00839C5.78273 10.0006 6.75025 10.9731 7.58803 11.8151C9.3991 9.99557 11.2766 8.10924 13.2578 6.11876C13.1315 6.0235 12.8958 5.8457 12.5653 5.5848Z"
            fill="#43A5F5"
          ></path>
          <path
            d="M12.6127 5.62634C12.8957 5.84569 13.1315 6.02349 13.2578 6.11876C11.2766 8.10923 9.39909 9.99556 7.58802 11.8151C6.75024 10.9731 5.78272 10.0006 4.7955 9.00838C5.47899 8.08636 5.53497 8.07709 6.42766 8.97964C6.77898 9.33484 7.10828 9.71183 7.49976 10.1353C7.84884 9.8417 8.15076 9.62055 8.41423 9.36046C9.54592 8.24327 10.6576 7.10568 11.799 5.9986C11.9995 5.80408 12.3072 5.71992 12.6127 5.62634Z"
            fill="#E1F1FD"
          ></path>
        </g>
        <defs>
          <clipPath id="clip0_42_19"><rect width="17" height="17" fill="white"></rect></clipPath>
        </defs>
      </svg>
    </div>
    <p
      style="width: 671px; height: 111px; position: absolute; left: 235px; top: 51px; font-size: 11px; font-weight: 500; text-align: left; color: #000;"
    >
      <?= $perfil['DATA']['0']['description'] ?>
    </p>
    <?php
      if($perfil['DATA']['0']['id'] == (new user())->getID()){
        echo('<a href="/profile/edit"> <div style="width: 134px; height: 39.49px;"> <div style="width: 133.97px; height: 39.49px; position: absolute; left: 967.5px; top: 61.91px; border-radius: 22px; background: #d9d9d9;" ></div> <p style="width: 90px; height: 22px; position: absolute; left: 1012px; top: 70px; font-size: 16px; font-weight: 700; text-align: left; color: #000;" > EDITAR </p> <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 25px; height: 25px; position: absolute; left: 984px; top: 69px;" preserveAspectRatio="none" > <path d="M16.9823 4.48229C17.2137 4.24704 17.4895 4.05994 17.7936 3.93179C18.0977 3.80364 18.4242 3.73697 18.7542 3.73562C19.0842 3.73428 19.4112 3.79829 19.7164 3.92396C20.0216 4.04963 20.2988 4.23448 20.5322 4.46784C20.7655 4.70119 20.9504 4.97845 21.076 5.2836C21.2017 5.58875 21.2657 5.91577 21.2644 6.24578C21.263 6.5758 21.1964 6.90228 21.0682 7.2064C20.9401 7.51052 20.753 7.78626 20.5177 8.01771L19.526 9.00833L15.9917 5.47396L16.9823 4.48229ZM14.224 7.24167L3.75 17.7146V21.25H7.28542L17.7604 10.776L14.224 7.24167Z" fill="black" ></path> </svg> </div> </a>');
      }
    ?>
  </div>
</div>
  <hr class="pb-1">
  <div class="stproducts container h-auto mt-2 rounded-xl">
    <div class="grid ml-5 grid-rows-1 auto-rows-max grid-cols-5 gap-5 items-center mb-20 justify-center">
      <?= $api->CREATE_CARDS_BY_OWNER($id); ?>
    </div>
  </div>
</div>
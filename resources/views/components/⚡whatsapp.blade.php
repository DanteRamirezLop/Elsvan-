<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <div class="wa__btn_popup">
        <div class="wa__btn_popup_txt">¿Necesitas ayuda? <strong>Conversa con un asesor</strong></div>
        <div class="wa__btn_popup_icon"></div>
    </div>
    <div class="wa__popup_chat_box">
        <div class="wa__popup_heading">
            <div class="wa__popup_title">Inicia la Conversación</div>
            <div class="wa__popup_intro">¡Hola! Haga clic en uno de nuestros Asesores a continuación para chatear en <strong>WhatsApp</strong>
        </div>
    </div>
    <div class="wa__popup_content wa__popup_content_left">
        <div class="wa__popup_notice">El equipo suele responder en unos minutos.</div>
            <div class="wa__popup_content_list">

                <!-- foreach($whatsapps as $items) -->
                <div class="wa__popup_content_item ">
                    <a target="_blank" href="https://web.whatsapp.com/send?phone=&amp;text=Hola, tengo una consulta" class="wa__stt wa__stt_online">
                        <div class="wa__popup_avatar">
                            <div class="wa__cs_img_wrap wrap_img_icon"></div>
                        </div>
                        <div class="wa__popup_txt">
                            <div class="wa__member_name">Nombre</div>
                            <div class="wa__member_duty"> Titulo</div>
                        </div>
                    </a>
                </div>
                <!-- endforeach -->




            </div>
        </div>
    </div>
</div>

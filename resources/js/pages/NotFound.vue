<template>
    <div class="container">
        <h2>Errore 404, pagina non trovata</h2>
        <router-link class="nav-link" :to="{ name: 'home' }">Torna alla Home per non perderti i contenuti più interessanti</router-link>
    </div>
</template>

<script>

export default {
   name: "NotFound",
   
}
</script>
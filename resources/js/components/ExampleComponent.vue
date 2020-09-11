<template>
    <div id="contact" class="form-2">
    <div class="container" style="background-color: #ffbd33">
        <div class="row">
            <div class="col-lg-12">
                <h2>Contact Us</h2>
                <ul class="list-unstyled li-space-lg">
                    <li class="address">Don't hesitate to give us a call or send us a contact form message</li>
                    <li><i class="fas fa-map-marker-alt"></i>Address:  Second Floor, Olaya Mall, King Fahad Rd, Riyadh, Saudi Arabia</li>
                    <li><i class="fas fa-phone"></i><a  href="tel:003024630820">+966505465830</a></li>
                    <li><i class="fas fa-envelope"></i><a href="mailto:sales@asaheeb.co">info@intercraftsol.com</a></li>
                </ul>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-6" style="padding-bottom: 10px">
                <div class="map-responsive">
                    
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3624.3658335462483!2d46.67178171509668!3d24.71431778412307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f02d2621b42dd%3A0xeeb84fa26c695b09!2sOLAYA%20MALL!5e0!3m2!1sen!2s!4v1599640427643!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div> <!-- end of col -->
            <div class="col-lg-6">
    
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" v-model="fields.name" />
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
        </div>
	
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" v-model="fields.email" />
            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
        </div>
	
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" v-model="fields.message"></textarea>
            <div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Send message</button>

        <div v-if="success" class="alert alert-success mt-3">
            Message sent!
        </div>
    </form>

</div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-2 -->
<!-- end of contact -->
    
</template>

<script>
    export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
    }
  },
  methods: {
    submit() {
      if (this.loaded) {
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios.post('/submit', this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
  },
}
</script>

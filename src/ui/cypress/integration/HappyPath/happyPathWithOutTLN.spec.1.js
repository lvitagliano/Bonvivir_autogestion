context('Happy Path', () => {
  describe('Landing', () => {
    it('test titulo ppal', () => {
      cy.visit('selection');
      cy.viewport(1280, 720);
      cy.get('.navbar__text').contains('¡Formá parte del Club ahora!');
      cy.get('div[class="col-md-12"]').find(
        'img[src="/images/selectionA.png"]'
      ); // some code that test that image is loaded so that it is displaye on the web page
    });

    it('test SeleccionExclusivaBlanca', () => {
      cy.viewport(1280, 720);
      cy.get('.selection__h4')
        .contains('Selección Exclusiva Blanca')
        .click();
      cy.get('.selection__subtitle').contains(
        'Propuestas variada de vinos blancos y tintos.'
      );
      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('6 botellas');
    });

    it('test tengoClubLaNacion', () => {
      cy.viewport(1280, 720);
      cy.get('.checkbox > p').contains('Tengo la tarjeta Club LA NACION');
      cy.get('.checkmark').click();
      cy.get('.main-container__footer__img').should('exist');
    });

    it('test Continuar Landing', () => {
      cy.viewport(1280, 720);
      cy.get('.button__primary').click();
    });

    it('selection', () => {
      cy.get('.registration__cup-steps > :nth-child(1) > img')
        .parent()
        .should('have.class', 'step--active');

      cy.get('.registration__form > :nth-child(1) > .form-control')
        .type('Vanesa Graciela')
        .should('have.value', 'Vanesa Graciela');

      cy.get('.registration__form > :nth-child(2) > .form-control')
        .type('Graciela')
        .should('have.value', 'Graciela');

      cy.get('.registration__container-tel > :nth-child(1) > .form-control')
        .type('11')
        .should('have.value', '11');

      cy.get('.input-number > .form-control')
        .type('49006767')
        .should('have.value', '49006767');

      cy.get(':nth-child(4) > .form-control')
        .type('vanesag@gmail.com')
        .should('have.value', 'vanesag@gmail.com');

      cy.get('[name="date.day"]').select('17');
      cy.get('[name="date.month"]').select('Septiembre');
      cy.get('[name="date.year"]').select('1978');

      cy.get('.button__primary').click();
    });

    it('test titulo', () => {
      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos de facturación'
      );
    });

    it('test copa', () => {
      cy.get('.registration__cup-steps > :nth-child(3) > img')
        .parent()
        .should('have.class', 'step--active');
    });

    it('Selccionar RI', () => {
      cy.get('#proofOfPayment').select('Responsable Inscripto');
    });

    it('test CUIT', () => {
      cy.get(':nth-child(2) > .form-control')
        .type('27268731569', { delay: 300 })
        .should('have.value', '27268731569');
    });

    it('test sin tarjeta', () => {
      cy.get(
        "[class='registration__card-container registration__card']"
      ).should('not.be.visible');
    });

    it('test mensaje tarjeta', () => {
      cy.get('.registration__card-container > .row > .col-md-6').should(
        'have.text',
        'Pedí tu tarjeta y obtené\nhasta un 20% de\ndescuento.'
      );
    });

    it('test boton Continuar envio', () => {
      cy.get('.button__primary').click();
    });

    it('test titulo envío', () => {
      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos de envío'
      );
    });

    it('test calle nro codigo piso depto', () => {
      cy.get('[name="street"]').type('Av. Segurola');
      cy.get('[name="streetNumber"]').type('1546');
      cy.get('[name="zipCode"]').type('1407');
      cy.get('[name="floorApartment"]').type('8vo');
      cy.get('[name="apartment"]').type('D');
      cy.get('[name="additionalData"]').type(
        'Datos Adicionales respecto de la dirección'
      );
    });

    it('test boton Continuar pago', () => {
      cy.get('.button__primary').click();
    });

    it('test titulo pago', () => {
      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos de pago'
      );
    });

    it('test tc Visa', () => {
      cy.get('[name="cardNumber"]').type('4507990000000010');
      cy.get('[name="cardOwner"]').type('Vanesa G Graciela');
    });

    it('test texto term y cond', () => {
      cy.get('[class="registration__authorization-clubBonvivir"]').should(
        'have.text',
        'Autorizo a Club BONVIVIR a realizar el débito automático mensual correspondiente a la (selección elegida) por el precio indicado en este formulario, quedando sujeto al Reglamento publicado en la  página web.'
      );
    });
    it('test check term y cond', () => {
      cy.get('.checkmark').click(); // name = authorizationClubBonvivir
    });

    it('test boton Confirmar', () => {
      cy.get('.button__primary').click();
    });

    it('selection subscription', () => {
      cy.viewport(1280, 720);
      cy.visit('subscription');
    });

    it('test titulo Felicitaciones', () => {
      cy.get('.ModalMsj__h1').should('have.text', '¡Felicitaciones!');
    });
    it('test titulo2', () => {
      cy.get('.ModalMsj__h2').should('have.text', 'Ya sos parte del Club');
    });

    it('test titulo3hp', () => {
      cy.get('.ModalMsj__p').should(
        'have.text',
        'Vas a recibir un email con los detalles de la suscripción, regístrate para administrar tu cuenta.'
      );
    });
  });
});

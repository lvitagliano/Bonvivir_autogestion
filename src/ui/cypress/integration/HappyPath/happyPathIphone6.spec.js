context('Happy Path', () => {
  beforeEach(() => {
    cy.viewport('iphone-6');
  });
  describe('Landing', () => {
    it('test titulo ppal', () => {
      cy.visit('selection');
      cy.viewport('iphone-6');
      cy.get('.navbar__text').contains('¡Formá parte del Club ahora!');
      cy.get('div[class="col-md-12"]').find(
        'img[src="/images/selectionA.png"]'
      ); // some code that test that image is loaded so that it is displaye on the web page
    });

    it('test SeleccionExclusiva', () => {
      cy.viewport('iphone-6');
      cy.get('.selection__h4').contains('Selección Exclusiva');
      // cy.get('.selection__card__select > :nth-child(1) > .selection__card > :nth-child(1) > .col-md-12 > .selection__h4')
      cy.get('.selection__subtitle').contains(
        'Diferentes cepas y estilos de vinos cuidadosamente elegidos.'
      );
      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('6 botellas');
      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('3 botellas');
    });

    it('test SeleccionExclusivaBlanca', () => {
      cy.viewport('iphone-6');
      cy.get('.selection__h4').contains('Selección Exclusiva Blanca');
      cy.get('.selection__subtitle').contains(
        'Propuestas variada de vinos blancos y tintos.'
      );
      cy.get(
        '.selection__card__select > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('6 botellas');
    });

    it('test SeleccióndeAltaGama', () => {
      cy.viewport('iphone-6');
      cy.get('.selection__h4').contains('Selección Alta Gama');
      cy.get('.selection__subtitle').contains(
        'Vinos excepcionales complejos y con gran potencial de guarda.'
      );

      cy.get(
        ':nth-child(4) > :nth-child(2) > :nth-child(2) > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('4 botellas');
      cy.get(
        ':nth-child(4) > :nth-child(2) > :nth-child(2) > :nth-child(1) > .selection__card > :nth-child(3)'
      ).contains('2 botellas');
    });

    it('test tengoClubLaNacion', () => {
      cy.viewport('iphone-6');
      cy.get('.checkbox > p').contains('Tengo la tarjeta Club LA NACION');
      cy.get('.main-container__footer__img').should('exist');
    });

    it('test Continuar Landing', () => {
      cy.viewport('iphone-6');
      cy.get('.button__primary').click();
    });
  });

  describe('Test inputs paso 1', () => {
    it('selection', () => {
      cy.viewport('iphone-6');
      cy.visit('selection');
      cy.get('.button__primary').click();

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

      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos de facturación'
      );
    });
  });

  describe('Test inputs paso 2', () => {
    it('test titulo', () => {
      cy.viewport('iphone-6');
      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos de facturación'
      );
    });

    it('test copa', () => {
      cy.viewport('iphone-6');
      cy.get('.registration__cup-steps > :nth-child(3) > img')
        .parent()
        .should('have.class', 'step--active');
    });

    it('Selccionar CF', () => {
      cy.viewport('iphone-6');
      cy.get('#proofOfPayment').select('Consumidor Final');
    });

    it('test DNI', () => {
      cy.viewport('iphone-6');
      cy.get(':nth-child(2) > .form-control')
        .type('34180216', { delay: 100 })
        .should('have.value', '34180216');
    });

    it('Selccionar RI', () => {
      cy.viewport('iphone-6');
      cy.get('#proofOfPayment').select('Responsable Inscripto');
    });

    it('test CUIT', () => {
      cy.viewport('iphone-6');
      cy.get(':nth-child(2) > .form-control')
        .type('27268731569', { delay: 100 })
        .should('have.value', '27268731569');
    });

    it('test nro de tarjeta', () => {
      cy.viewport('iphone-6');
      cy.get('.row > :nth-child(2) > .form-group > .form-control')
        .type('6391300083977836', { delay: 100 })
        .should('have.value', '6391300083977836');
    });

    it('test mensaje tarjeta', () => {
      cy.viewport('iphone-6');
      cy.get('.slider').click();
      cy.get('.registration__card-container > .row > .col-md-6').should(
        'have.text',
        'Pedí tu tarjeta y obtené\nhasta un 20% de\ndescuento.'
      );
    });

    it('test boton Continuar', () => {
      cy.viewport('iphone-6');
      cy.get('.button__primary').click();
    });
  });

  describe('Test inputs paso 3', () => {
    it('test titulo', () => {
      cy.viewport('iphone-6');
      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos de envío'
      );
    });

    it('test calle nro codigo piso depto', () => {
      cy.viewport('iphone-6');
      cy.get('[name="street"]').type('Av. Segurola');
      cy.get('[name="streetNumber"]').type('1546');
      cy.get('[name="zipCode"]').type('1407');
      cy.get('[name="floorApartment"]').type('8vo');
      cy.get('[name="apartment"]').type('D');
      cy.get('[name="additionalData"]').type(
        'Datos Adicionales respecto de la dirección'
      );
    });
    it('test boton Continuar', () => {
      cy.viewport('iphone-6');
      cy.get('.button__primary').click();
    });
  });

  describe('Test inputs paso 4', () => {
    it('test titulo', () => {
      cy.viewport('iphone-6');
      cy.get(':nth-child(3) > .registration__title > .title__h3').should(
        'have.text',
        'Datos de pago'
      );
    });

    // 376411234531007 American Express 123 10/30
    // 5896570000000008 Cabal 123 10/30
    // 36463664750005 Diners 123 10/30
    // 5323601111111112 Mastercard 123 10/30
    // 4507990000000010 Visa 123 10/30

    // it('test tc American', () => {
    //  cy.get('[name="cardNumber"]').type('376411234531007');
    //  cy.get('[name="cardOwner"]').type('Vanesa G Graciela');
    // });

    it('test tc Visa', () => {
      cy.viewport('iphone-6');
      cy.get('[name="cardNumber"]').type('4507990000000010');
      cy.get('[name="cardOwner"]').type('Vanesa G Graciela');
    });

    // it('test tc Master', () => {
    //  cy.get('[name="cardNumber"]').type('5323601111111112');
    //  cy.get('[name="cardOwner"]').type('Vanesa G Graciela');
    // });

    it('test texto term y cond', () => {
      cy.viewport('iphone-6');
      cy.get('[class="registration__authorization-clubBonvivir"]').should(
        'have.text',
        'Autorizo a Club BONVIVIR a realizar el débito automático mensual correspondiente a la (selección elegida) por el precio indicado en este formulario, quedando sujeto al Reglamento publicado en la  página web.'
      );
      // cy.get('.checkmark').check();//name = authorizationClubBonvivir
    });
    it('test check term y cond', () => {
      cy.viewport('iphone-6');
      cy.get('.checkmark').click(); // name = authorizationClubBonvivir
    });

    it('test boton Continuar', () => {
      cy.viewport('iphone-6');
      cy.get('.button__primary').click();
    });
  });

  describe('Test subscription', () => {
    it('selection', () => {
      cy.viewport('iphone-6');
      cy.visit('subscription');
    });

    it('test titulo', () => {
      cy.viewport('iphone-6');
      cy.get('.ModalMsj__h1').should('have.text', '¡Felicitaciones!');
    });
    it('test titulo2', () => {
      cy.viewport('iphone-6');
      cy.get('.ModalMsj__h2').should('have.text', 'Ya sos parte del Club');
    });

    it('test titulo_msg', () => {
      cy.viewport('iphone-6');
      cy.get('.ModalMsj__p').should(
        'have.text',
        'Vas a recibir un email con los detalles de la suscripción, regístrate para administrar tu cuenta.'
      );
    });
  });
});

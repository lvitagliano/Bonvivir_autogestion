// import { ERROR_MESSAGES } from '../../fixtures';

context('Form Step 4', () => {
  describe('pre condition to Step4 OK', () => {
    it('selection', () => {
      cy.viewport(1280, 720);
      cy.visit('selection');
      cy.get('.button__primary').click();
      cy.get("[name='name']").type('Nombre');
      cy.get("[name='lastName']").type('Apellido');
      cy.get("[name='cod']").type('11');
      cy.get("[name='tel']").type('12341234');
      cy.get("[name='email']").type('pepe@email.com');
      cy.get('[name="date.day"]').select('31');
      cy.get('[name="date.month"]').select('Diciembre');
      cy.get('[name="date.year"]').select('1987');
      cy.get('.button__primary').click();
      cy.get('#proofOfPayment').select('Responsable Inscripto');
      cy.get('[name="cuit"]').type('27268731569');
      cy.get('[name="cardNumber"]').type('6391300083977836');
      cy.get('.button__primary').click();
      cy.get('[name="street"]').type('Av. Segurola');
      cy.get('[name="streetNumber"]').type('1546');
      cy.get('[name="zipCode"]').type('1407');
      cy.get('[name="floorApartment"]').type('8vo');
      cy.get('[name="apartment"]').type('D');
      cy.get('[name="additionalData"]').type(
        'Datos Adicionales respecto de la dirección'
      );
      cy.get('.button__primary').click();
    });
  });

  describe('Test inputs Step4 Ok', () => {
    it('test titulo', () => {
      cy.viewport(1280, 720);
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

    it('test tc American', () => {
      cy.get('[name="cardNumber"]').type('376411234531007');
      cy.get('[name="cardOwner"]').type('Vanesa G Graciela');
      // cy.get('.helpers__text-right > img').should('have.src','data:image/png;base64,iVBOR');
      // .should('have.src','data:image/png;base64,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')
      // cy.get('[class="navbar__logo-image"]').should('have.text','data:image/png;base64,iVBOR');
      cy.get('[class="registration__authorization-clubBonvivir"]').should(
        'have.text',
        'Autorizo a Club BONVIVIR a realizar el débito automático mensual correspondiente a la (selección elegida) por el precio indicado en este formulario, quedando sujeto al Reglamento publicado en la  página web.'
      );
      cy.get('.checkmark').click(); // name = authorizationClubBonvivir
      cy.get('.button__primary').click();
      cy.get(':nth-child(3) > :nth-child(2) > p').should(
        'have.text',
        '¡Lo sentimos! Por el momento no estamos aceptando esta tarjeta. '
      );
      cy.get('[name="cardOwner"]').clear();
      cy.get('[name="cardNumber"]').clear();
    });

    it('test tc Cabal', () => {
      cy.get('[name="cardNumber"]').type('5896570000000008');
      cy.get('[name="cardOwner"]').type('Vanesa G Graciela');
      cy.get('[class="registration__authorization-clubBonvivir"]').should(
        'have.text',
        'Autorizo a Club BONVIVIR a realizar el débito automático mensual correspondiente a la (selección elegida) por el precio indicado en este formulario, quedando sujeto al Reglamento publicado en la  página web.'
      );
      cy.get('.checkmark').click(); // name = authorizationClubBonvivir
      cy.get('.button__primary').click();
      cy.get(':nth-child(3) > :nth-child(2) > p').should(
        'have.text',
        '¡Lo sentimos! Por el momento no estamos aceptando esta tarjeta. '
      );
      cy.get('[name="cardOwner"]').clear();
      cy.get('[name="cardNumber"]').clear();
    });

    it('test tc Visa', () => {
      cy.get('[name="cardNumber"]').type('4507990000000010');
      cy.get('[name="cardOwner"]').type('Vanesa G Graciela');
      cy.get('[name="cardOwner"]').clear();
      cy.get('[name="cardNumber"]').clear();
    });

    it('test tc Master', () => {
      cy.get('[name="cardNumber"]').type('5323601111111112');
      cy.get('[name="cardOwner"]').type('Vanesa G Graciela');
    });

    // it('test tc Naranja', () => {
    //   cy.get('[name="cardNumber"]').type('5896570000000008');
    //   cy.get('[name="cardOwner"]').type('Vanesa G Graciela');
    //   cy.get('[class="registration__authorization-clubBonvivir"]').should(
    //     'have.text',
    //     'Autorizo a Club BONVIVIR a realizar el débito automático mensual correspondiente a la (selección elegida) por el precio indicado en este formulario, quedando sujeto al Reglamento publicado en la  página web.'
    //   );
    //   cy.get('.checkmark').click(); // name = authorizationClubBonvivir
    //   cy.get('.button__primary').click();
    //   cy.get(':nth-child(3) > :nth-child(2) > p').should('have.text','¡Lo sentimos! Por el momento no estamos aceptando esta tarjeta. ');
    // });

    it('test check term y cond', () => {
      cy.get('.checkmark').click(); // name = authorizationClubBonvivir
    });

    it('test texto term y cond', () => {
      cy.get('[class="registration__authorization-clubBonvivir"]').should(
        'have.text',
        'Autorizo a Club BONVIVIR a realizar el débito automático mensual correspondiente a la (selección elegida) por el precio indicado en este formulario, quedando sujeto al Reglamento publicado en la  página web.'
      );
      // cy.get('.checkmark').check();//name = authorizationClubBonvivir
    });

    it('test boton Continuar', () => {
      cy.get('.button__primary').click();
    });
  });
});

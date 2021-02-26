context('Form Step 2', () => {
  describe('pre condition to Step2 Fail', () => {
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
    });
  });

  describe('Test inputs Step2 Fail', () => {
    it('test boton Continuar', () => {
      cy.get('.button__primary').click();
    });

    it('tipo de comporbante', () => {
      cy.get("[type='checkbox']").then($slide => {
        if ($slide.hasClass('active')) {
          cy.get('.slider').click();
        }
      });

      cy.get('#proofOfPayment').select('Consumidor Final');
      cy.get('.button__primary').click();
      cy.get(':nth-child(2) > .error-input').should(
        'have.text',
        'Por favor ingresá tu DNI (o pasaporte si sos extranjero). '
      );

      cy.get('#proofOfPayment').select('Responsable Inscripto');
      cy.get('.button__primary').click();
      cy.get(':nth-child(2) > .error-input').should(
        'have.text',
        'Por favor ingresá tu CUIT. '
      );
    });

    it('test nro de tarjeta fallido', () => {
      cy.get("[type='checkbox']").then($slide => {
        if ($slide.hasClass('inactive')) {
          cy.get('.slider').click();
        }
      });
      cy.get('.row > :nth-child(2) > .form-group > .form-control')
        .type('6391300083977', { delay: 100 })
        .should('have.value', '6391300083977');
      cy.get('.button__primary').click();

      cy.get().should(
        'Por favor ingresá un número de Tarjeta La Nación válido. '
      );
    });

    // 639130 00839778 36
    it('test cuit Fail', () => {
      cy.get("[type='checkbox']").then($slide => {
        if ($slide.hasClass('active')) {
          cy.get('.slider').click();
        }
      });
      cy.get('#proofOfPayment').select('Responsable Inscripto');
      cy.get(':nth-child(2) > .form-control').type('1234', { delay: 200 });
      cy.get(':nth-child(2) > .error-input').should(
        'have.text',
        'Por favor ingresá un CUIT válido. '
      );
    });
  });
});

describe('pre condition to Step2 Ok', () => {
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
  });
});

describe('Test inputs Step2 Ok', () => {
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

  it('Selccionar CF', () => {
    cy.get('#proofOfPayment').select('Consumidor Final');
  });

  it('test DNI', () => {
    cy.get(':nth-child(2) > .form-control')
      .type('34180216', { delay: 100 })
      .should('have.value', '34180216');
  });

  it('Selccionar RI', () => {
    cy.get('#proofOfPayment').select('Responsable Inscripto');
  });

  it('test CUIT', () => {
    cy.get(':nth-child(2) > .form-control')
      .type('27268731569', { delay: 100 })
      .should('have.value', '27268731569');
  });

  it('test nro de tarjeta', () => {
    cy.get('.row > :nth-child(2) > .form-group > .form-control')
      .type('6391300083977836', { delay: 100 })
      .should('have.value', '6391300083977836');
  });

  it('test mensaje tarjeta', () => {
    cy.get('.slider').click();
    cy.get('.registration__card-container > .row > .col-md-6').should(
      'have.text',
      'Pedí tu tarjeta y obtené\nhasta un 20% de\ndescuento.'
    );
  });

  it('test boton Continuar', () => {
    cy.get('.button__primary').click();
  });
});

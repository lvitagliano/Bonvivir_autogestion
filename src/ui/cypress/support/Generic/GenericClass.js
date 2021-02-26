class Generic {
  static visit() {
    cy.viewport(1280, 720);
    cy.visit('selection');
  }

  static registrationCupsStep1(numberOfStep = '1') {
    cy.get(`.registration__cup-steps > :nth-child(${numberOfStep}) > img`)
      .parent()
      .should('have.class', 'step--active');
  }

  static checkPrice(seleccion) {
    if (seleccion === 'AltaGama') {
      cy.get('.registration__Left-container__price-container__special').should(
        'have.text',
        '$2,444'
      );
      cy.get('.col-md-12 > :nth-child(4)').should('have.text', '$1,955');
    }
  }

  static continuar(identifer = '.button__primary') {
    cy.get(identifer).click();
  }

  static fieldDisabled(field) {
    cy.get(`[name=${field}]`).should('be.disabled');
  }

  static fieldNotBeDisabled(field) {
    cy.get(`[name=${field}]`).should('not.be.disabled');
  }

  static objectNotBeVisible(identifer) {
    cy.get(identifer).should('not.be.visible');
  }

  static objectBeVisible(identifer) {
    cy.get(identifer).should('be.visible');
  }

  static fieldType(field, content) {
    cy.get(`[name=${field}]`).type(content);
  }
}

export default Generic;
